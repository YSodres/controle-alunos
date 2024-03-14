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
        $sql = "INSERT INTO escolas (nome, endereco, data_cadastro, situacao) 
                VALUES (:nome, :endereco, :data_cadastro, :situacao)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":nome", $escola->nome);
        $stmt->bindValue(":endereco", $escola->endereco);
        $stmt->bindValue(":data_cadastro", $escola->data_cadastro);
        $stmt->bindValue(":situacao", $escola->situacao);
        $stmt->execute();
    }
}