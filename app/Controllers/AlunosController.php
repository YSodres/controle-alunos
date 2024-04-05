<?php

declare(strict_types=1);

namespace ControleAlunos\Controllers;

use ControleAlunos\Models\Aluno;
use ControleAlunos\Repositories\AlunosRepository;
use ControleAlunos\Controllers\AbstractController;

class AlunosController extends AbstractController
{
    protected $alunosRepository;
    
    protected function beforeAction()
    {
        $this->alunosRepository = new AlunosRepository($this->pdo);
    }

    public function create()
    {
        require_once __DIR__ . "/../../views/cadastro-alunos.php";
    }
}