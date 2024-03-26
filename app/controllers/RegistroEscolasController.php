<?php

declare(strict_types=1);

namespace ControleAlunos\Controllers;

use ControleAlunos\Models\Escola;
use ControleAlunos\Repositories\EscolasRepository;
use ControleAlunos\Controllers\AbstractController;

class RegistroEscolasController extends AbstractController
{
    protected $escolasRepository;

    protected function beforeAction()
    {
        $this->escolasRepository = new EscolasRepository($this->pdo);
    }

    public function get()
    {  
        require_once __DIR__ . "/../../views/registro-escolas.php";
    }

    public function post()
    {
        $escola = new Escola();
        $escola->nome = $_POST["nome"];
        $escola->endereco = $_POST["endereco"];
        $escola->status = $_POST["situacao"];

        $this->escolasRepository->store($escola);

        header("Location: listagem-escolas");
        exit();
    }
}
