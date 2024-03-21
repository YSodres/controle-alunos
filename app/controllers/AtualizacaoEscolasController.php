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
        require_once __DIR__ . "/../../views/atualizacao-escolas.php";
    }

    public function post()
    {
        $escolas = $this->escolasRepository->all();
        $escolaId = $_POST["escola-id"] ?? null;
        

        if (!empty($escolaId)){
            $escola = new Escola();
            $escola->id = $_POST["id"];
            $escola->nome = $_POST["nome"];
            $escola->endereco = $_POST["endereco"];
            $escola->situacao = $_POST["situacao"];
            
            $this->escolasRepository->update($escola);

            header("Location: atualizar-escola");
        }
    }
}
