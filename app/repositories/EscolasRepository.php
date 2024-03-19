<?php

namespace ControleAlunos\repositories;

use ControleAlunos\models\Escola;
use ControleAlunos\repositories\AbstractRepository;

class EscolasRepository extends AbstractRepository
{
    private $model = Escola::class;

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