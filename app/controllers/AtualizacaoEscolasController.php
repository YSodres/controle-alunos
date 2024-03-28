<?php

declare(strict_types=1);

namespace ControleAlunos\controllers;

use ControleAlunos\models\Escola;
use ControleAlunos\repositories\EscolasRepository;
use ControleAlunos\controllers\AbstractController;

class AtualizacaoEscolasController extends AbstractController
{
    protected $escolasRepository;

    protected function beforeAction()
    {
        $this->escolasRepository = new EscolasRepository($this->pdo);
    }

    public function get()
    {  
        $escolas = $this->escolasRepository->all();
        $escola = null;

        require_once __DIR__ . "/../../views/atualizacao-escolas.php";
    }

    public function post()
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
}
