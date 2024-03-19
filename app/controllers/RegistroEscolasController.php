<?php

declare(strict_types=1);

namespace ControleAlunos\controllers;

use ControleAlunos\models\Escola;
use ControleAlunos\repositories\EscolasRepository;
use ControleAlunos\controllers\AbstractController;

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
        $escola->situacao = $_POST["situacao"];

        $this->escolasRepository->store($escola);

        header("Location: registrar-escola");
    }
}
