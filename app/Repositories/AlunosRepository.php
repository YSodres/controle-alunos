<?php

namespace ControleAlunos\Repositories;

use PDO;
use ControleAlunos\Models\Aluno;
use ControleAlunos\Repositories\AbstractRepository;

class AlunosRepository extends AbstractRepository
{
    private $model = Aluno::class;

    public function all()
    {
        $sql = "SELECT * FROM alunos ORDER BY id";
        $stmt = $this->database->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, $this->model);
    }

    public function store(Aluno $aluno)
    {
        $sql = "INSERT INTO alunos (escola_id, nome, telefone, email, data_nascimento, genero) 
                VALUES (:escola_id, :nome, :telefone, :email, :data_nascimento, :genero)";
        $stmt = $this->database->prepare($sql);
        $stmt->bindValue(":escola_id", $aluno->escola_id);
        $stmt->bindValue(":nome", $aluno->nome);
        $stmt->bindValue(":telefone", $aluno->telefone);
        $stmt->bindValue(":email", $aluno->email);
        $stmt->bindValue(":data_nascimento", $aluno->data_nascimento);
        $stmt->bindValue(":genero", $aluno->genero);
        $stmt->execute();
    }

    public function update(Aluno $aluno)
    {
        $sql = "UPDATE alunos SET escola_id = :escola_id, nome = :nome, telefone = :telefone,
                email = :email, data_nascimento = :data_nascimento, genero = :genero WHERE id = :id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindValue(":escola_id", $aluno->escola_id);
        $stmt->bindValue(":nome", $aluno->nome);
        $stmt->bindValue(":telefone", $aluno->telefone);
        $stmt->bindValue(":email", $aluno->email);
        $stmt->bindValue(":data_nascimento", $aluno->data_nascimento);
        $stmt->bindValue(":genero", $aluno->genero);
        $stmt->bindValue(":id", $aluno->id);
        $stmt->execute();
    }

    public function find($id)
    {
        $sql = "SELECT * FROM alunos WHERE id = :id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM alunos WHERE id = :id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
    }
}