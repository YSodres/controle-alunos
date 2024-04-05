<?php

declare(strict_types=1);

namespace ControleAlunos\Controllers;

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
        require_once __DIR__ . "/../../views/cadastro-escolas.php";
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

        header("Location: listar-escolas");
        exit();
    }

    public function update()
    {
        if (isset($_POST["confirmar"]) && (!empty($_POST["escola_id"]))) {
            $escola = new Escola();
            $escola->id = $_POST["escola_id"];
            $escola->nome = $_POST["nome"];
            $escola->endereco = $_POST["endereco"];
            $escola->status = $_POST["situacao"];

            $this->escolasRepository->update($escola);

            header("Location: listar-escolas");
            exit();
        }

        if (isset($_POST["excluir"]) && (!empty($_POST["escola_id"]))) {
            $this->delete();
        }
    }

    private function delete()
    {
        $this->escolasRepository->delete($_POST["escola_id"]);

        header("Location: listar-escolas");
        exit();
    }

    public function show()
    {
        $escola = $this->escolasRepository->find($_GET["escola_id"]);

        if ($escola) {
            echo json_encode($escola);
        } else {
            echo json_encode(["error" => "Escola não encontrada"]);
        }
    }
}
