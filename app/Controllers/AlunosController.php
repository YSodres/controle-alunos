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
        $this->alunosRepository = new AlunosRepository($this->container);
    }

    public function index()
    {
        $alunos = $this->alunosRepository->all();

        $this->render('listagem-alunos', ['alunos' => $alunos]);
    }

    public function create()
    {
        $this->render('cadastro-alunos');
    }

    public function store()
    {
        $aluno = new Aluno();
        $aluno->escola_id = $_POST['escola_id'];
        $aluno->nome = $_POST['nome'];
        $aluno->telefone = $_POST['telefone'];
        $aluno->email = $_POST['email'];
        $aluno->data_nascimento = $_POST['data_nascimento'];
        $aluno->genero = $_POST['genero'];

        $this->alunosRepository->store($aluno);

        $this->redirectTo('listar-alunos');
    }

    public function edit()
    {
        $params = [
            'alunos' => $alunos = $this->alunosRepository->all(),
            'aluno' => null
        ];

        $this->render('atualizacao-alunos', $params);
    }

    public function update()
    {
        if (isset($_POST['confirmar']) && (!empty($_POST['id']))) {
            $aluno = new Aluno();
            $aluno->id = $_POST['id'];
            $aluno->escola_id = $_POST['escola_id'];
            $aluno->nome = $_POST['nome'];
            $aluno->telefone = $_POST['telefone'];
            $aluno->email = $_POST['email'];
            $aluno->data_nascimento = $_POST['data_nascimento'];
            $aluno->genero = $_POST['genero'];

            $this->alunosRepository->update($aluno);

            $this->redirectTo('listar-alunos');
        }
    }

    public function delete()
    {
        $response = ['success' => false];

        if (!empty($_GET['id'])) {
            $this->alunosRepository->delete($_GET['id']);
            $response['success'] = true;
        } else {
            $response['message'] = 'ID do aluno não fornecido.';
        }

        $this->renderJson($response);
    }

    public function show()
    {
        $aluno = $this->alunosRepository->find($_GET['id']);

        if ($aluno) {
            $this->renderJson($aluno);
        } else {
            $this->renderJson(['error' => 'aluno não encontrado']);
        }
    }
}
