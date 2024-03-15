<?php

namespace ControleAlunos\repositories;

use PDO;
use ControleAlunos\models\Escola;
class EscolasRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function salvar(Escola $escola)
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