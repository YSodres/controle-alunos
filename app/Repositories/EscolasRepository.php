<?php

namespace ControleAlunos\Repositories;

use PDO;
use ControleAlunos\Models\Escola;
use ControleAlunos\Repositories\AbstractRepository;

class EscolasRepository extends AbstractRepository
{
    private $model = Escola::class;

    public function all()
    {
        $sql = "SELECT * FROM escolas ORDER BY id";
        $stmt = $this->database->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, $this->model);
    }
    
    public function store(Escola $escola)
    {
        $sql = "INSERT INTO escolas (nome, endereco, status) 
                VALUES (:nome, :endereco, :status)";
        $stmt = $this->database->prepare($sql);
        $stmt->bindValue(":nome", $escola->nome);
        $stmt->bindValue(":endereco", $escola->endereco);
        $stmt->bindValue(":status", $escola->status);
        $stmt->execute();
    }

    public function update(Escola $escola)
    {
        $sql = "UPDATE escolas SET nome = :nome, endereco = :endereco,
                status = :status WHERE id = :id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindValue(":nome", $escola->nome);
        $stmt->bindValue(":endereco", $escola->endereco);
        $stmt->bindValue(":status", $escola->status);
        $stmt->bindValue(":id", $escola->id);
        $stmt->execute();
    }

    public function find($id)
    {
        $sql = "SELECT * FROM escolas WHERE id = :id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM escolas WHERE id = :id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
    }
}