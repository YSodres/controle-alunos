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

        $this->render('listagem-escolas', ['escolas' => $escolas]);
    }

    public function create()
    {
        $this->render('cadastro-escolas');
    }

    public function edit()
    {
        $params = [
            'escolas' => $escolas = $this->escolasRepository->all(),
            'escola' => null
        ];

        $this->render('atualizacao-escolas', $params);
    }

    public function store()
    {
        $escola = new Escola();
        $escola->nome = $_POST['nome'];
        $escola->endereco = $_POST['endereco'];
        $escola->status = $_POST['status'];

        $this->escolasRepository->store($escola);

        $this->redirectTo('listar-escolas');
    }

    public function update()
    {
        if (isset($_POST['confirmar']) && (!empty($_POST['id']))) {
            $escola = new Escola();
            $escola->id = $_POST['id'];
            $escola->nome = $_POST['nome'];
            $escola->endereco = $_POST['endereco'];
            $escola->status = $_POST['status'];

            $this->escolasRepository->update($escola);

            $this->redirectTo('listar-escolas');
        }

        if (isset($_POST['excluir']) && (!empty($_POST['id']))) {
            $this->delete();
        }
    }

    private function delete()
    {
        $this->escolasRepository->delete($_POST['id']);

        $this->redirectTo('listar-escolas');
    }

    public function show()
    {
        $escola = $this->escolasRepository->find($_GET['id']);

        if ($escola) {
            echo json_encode($escola);
        } else {
            echo json_encode(['error' => 'Escola não encontrada']);
        }
    }
}
