<?php

declare(strict_types=1);

namespace ControleAlunos\controllers;

use PDO;
use PDOException;
use ControleAlunos\Models\Escola;
use ControleAlunos\Repositories\EscolasRepository;
use ControleAlunos\Controllers\AbstractController;

class EscolasController extends AbstractController
{
    protected $escolasRepository;

    protected function beforeAction()
    {
        $this->escolasRepository = new EscolasRepository($this->pdo);
    }

    public function index()
    {
        $escolas = $this->escolasRepository->all();
        require_once __DIR__ . "/../../views/listagem-escolas.php";
    }

    public function create()
    {
        require_once __DIR__ . "/../../views/registro-escolas.php";
    }

    public function edit()
    {
        $escolas = $this->escolasRepository->all();
        $escola = null;

        require_once __DIR__ . "/../../views/atualizacao-escolas.php";
    }

    public function store()
    {
        $escola = new Escola();
        $escola->nome = $_POST["nome"];
        $escola->endereco = $_POST["endereco"];
        $escola->status = $_POST["situacao"];

        $this->escolasRepository->store($escola);

        header("Location: listagem-escolas");
        exit();
    }

    public function update()
    {
        if (isset($_POST["confirmar"]) && (!empty($_POST["escola_id"]))){
            $escola = new Escola();
            $escola->id = $_POST["escola_id"];
            $escola->nome = $_POST["nome"];
            $escola->endereco = $_POST["endereco"];
            $escola->status = $_POST["situacao"];
                
            $this->escolasRepository->update($escola);

            header("Location: listagem-escolas");
            exit();
        }

        if (isset($_POST["excluir"]) && (!empty($_POST["escola_id"]))){
            $this->escolasRepository->delete($_POST["escola_id"]);

            header("Location: listagem-escolas");
            exit();
        }
    }

    public function show()
    {
        try {
            if (isset($_POST["escola_id"])) {
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $escolasRepository = new EscolasRepository($this->pdo);
                $escola = $escolasRepository->find($_POST["escola_id"]);
        
                if ($escola) {
                    echo json_encode($escola);
                } else {
                    echo json_encode(["error" => "Escola não encontrada"]);
                }
            } else {
                echo json_encode(["error" => "ID da escola não fornecida"]);
            }
        } catch (PDOException $e) {
            echo json_encode(["error" => "Erro na conexão com o banco de dados"]);
        }
    }
}