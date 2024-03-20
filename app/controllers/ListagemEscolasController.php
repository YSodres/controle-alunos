<?php

declare(strict_types=1);

namespace ControleAlunos\controllers;

use ControleAlunos\models\Escola;
use ControleAlunos\repositories\EscolasRepository;
use ControleAlunos\controllers\AbstractController;

class ListagemEscolasController extends AbstractController
{
    protected $escolasRepository;

    protected function beforeAction()
    {
        $this->escolasRepository = new EscolasRepository($this->pdo);
    }

    public function get()
    {
        $escolas = $this->escolasRepository->all();
        require_once __DIR__ . "/../../views/listagem-escolas.php";
    }

    public function post()
    {
        http_response_code(404);
    }
}