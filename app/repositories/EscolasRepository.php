<?php

namespace ControleAlunos\repositories;

use PDO;
use ControleAlunos\models\Escola;
use ControleAlunos\repositories\AbstractRepository;

class EscolasRepository extends AbstractRepository
{
    private $model = Escola::class;

    public function all()
    {
        $sql = "SELECT id, nome, endereco, data_cadastro, status
                FROM escolas ORDER BY id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, $this->model);
    }
    
    public function store(Escola $escola)
    {
        $sql = "INSERT INTO escolas (nome, endereco, status) 
                VALUES (:nome, :endereco, :situacao)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":nome", $escola->nome);
        $stmt->bindValue(":endereco", $escola->endereco);
        $stmt->bindValue(":situacao", $escola->situacao);
        $stmt->execute();
    }
}