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
        $this->escolasRepository = new EscolasRepository($this->container);
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
    }

    public function delete()
    {
        $response = ['success' => false];

        if (!empty($_GET['id'])) {
            $this->escolasRepository->delete($_GET['id']);
            $response['success'] = true;
        } else {
            $response['message'] = 'ID da escola não fornecido.';
        }

        $this->renderJson($response);
    }

    public function show()
    {
        $escola = $this->escolasRepository->find($_GET['id']);

        if ($escola) {
            $this->renderJson($escola);
        } else {
            $this->renderJson(['error' => 'Escola não encontrada']);
        }
    }
}
