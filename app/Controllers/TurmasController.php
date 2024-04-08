<?php

declare(strict_types=1);

namespace ControleAlunos\Controllers;

use ControleAlunos\Models\Turma;
use ControleAlunos\Repositories\TurmasRepository;
use ControleAlunos\Controllers\AbstractController;

class TurmasController extends AbstractController
{
    protected $turmasRepository;
    
    protected function beforeAction()
    {
        $this->turmasRepository = new TurmasRepository($this->pdo);
    }

    public function index()
    {
        $turmas = $this->turmasRepository->all();

        $this->render('listagem-turmas', ['turmas' => $turmas]);
    }

    public function create()
    {
        $this->render('cadastro-turmas');
    }

    public function store()
    {
        $turma = new Turma();
        $turma->escola_id = $_POST['escola_id'];
        $turma->nome = $_POST['nome'];
        $turma->telefone = $_POST['telefone'];
        $turma->email = $_POST['email'];
        $turma->data_nascimento = $_POST['data_nascimento'];
        $turma->genero = $_POST['genero'];

        $this->turmasRepository->store($turma);

        $this->redirectTo('listar-turmas');
    }

    public function edit()
    {
        $params = [
            'turmas' => $turmas = $this->turmasRepository->all(),
            'turma' => null
        ];

        $this->render('atualizacao-turmas', $params);
    }

    public function update()
    {
        if (isset($_POST['confirmar']) && (!empty($_POST['id']))) {
            $turma = new Turma();
            $turma->id = $_POST['id'];
            $turma->escola_id = $_POST['escola_id'];
            $turma->nome = $_POST['nome'];
            $turma->telefone = $_POST['telefone'];
            $turma->email = $_POST['email'];
            $turma->data_nascimento = $_POST['data_nascimento'];
            $turma->genero = $_POST['genero'];

            $this->turmasRepository->update($turma);

            $this->redirectTo('listar-turmas');
        }
    }

    public function delete()
    {
        $response = ['success' => false];

        if (!empty($_GET['id'])) {
            $this->turmasRepository->delete($_GET['id']);
            $response['success'] = true;
        } else {
            $response['message'] = 'ID da turma não fornecido.';
        }

        $this->renderJson($response);
    }

    public function show()
    {
        $turma = $this->turmasRepository->find($_GET['id']);

        if ($turma) {
            $this->renderJson($turma);
        } else {
            $this->renderJson(['error' => 'turma não encontrada']);
        }
    }
}