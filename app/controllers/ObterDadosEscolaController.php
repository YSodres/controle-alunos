<?php

namespace ControleAlunos\Controllers;

use PDO;
use PDOException;
use ControleAlunos\Repositories\EscolasRepository;

class ObterDadosEscolaController extends AbstractController
{
    public function post()
    {
        try {
            if (isset($_POST['escola_id'])) {
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $escolasRepository = new EscolasRepository($this->pdo);
                $escola = $escolasRepository->find($_POST['escola_id']);
        
                if ($escola) {
                    echo json_encode($escola);
                } else {
                    echo json_encode(['error' => 'Escola não encontrada']);
                }
            } else {
                echo json_encode(['error' => 'ID da escola não fornecida']);
            }
        } catch (PDOException $e) {
            echo json_encode(['error' => 'Erro na conexão com o banco de dados']);
        }
    }
}