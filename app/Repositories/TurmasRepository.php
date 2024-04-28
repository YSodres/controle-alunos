<?php

namespace ControleAlunos\Repositories;

use PDO;
use ControleAlunos\Models\Turma;
use ControleAlunos\Repositories\AbstractRepository;

class TurmasRepository extends AbstractRepository
{
    private $model = Turma::class;

    public function all()
    {
        $sql = "SELECT * FROM turmas ORDER BY id";
        $stmt = $this->database->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, $this->model);
    }

    public function store(Turma $turma)
    {
        $sql = "INSERT INTO turmas (escola_id, nome, ano, nivel_ensino, serie, turno) 
                VALUES (:escola_id, :nome, :ano, :nivel_ensino, :serie, :turno)";
        $stmt = $this->database->prepare($sql);
        $stmt->bindValue(":escola_id", $turma->escola_id);
        $stmt->bindValue(":nome", $turma->nome);
        $stmt->bindValue(":ano", $turma->ano);
        $stmt->bindValue(":nivel_ensino", $turma->nivel_ensino);
        $stmt->bindValue(":serie", $turma->serie);
        $stmt->bindValue(":turno", $turma->turno);
        $stmt->execute();
    }

    public function update(Turma $turma)
    {
        $sql = "UPDATE turmas SET escola_id = :escola_id, nome = :nome, ano = :ano, nivel_ensino = :nivel_ensino,
                serie = :serie, turno = :turno WHERE id = :id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindValue(":escola_id", $turma->escola_id);
        $stmt->bindValue(":nome", $turma->nome);
        $stmt->bindValue(":ano", $turma->ano);
        $stmt->bindValue(":nivel_ensino", $turma->nivel_ensino);
        $stmt->bindValue(":serie", $turma->serie);
        $stmt->bindValue(":turno", $turma->turno);
        $stmt->bindValue(":id", $turma->id);
        $stmt->execute();
    }

    public function find($id)
    {
        $sql = "SELECT * FROM turmas WHERE id = :id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM turmas WHERE id = :id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
    }
}