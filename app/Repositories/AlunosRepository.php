<?php

namespace ControleAlunos\Repositories;

use PDO;
use ControleAlunos\Models\Aluno;
use ControleAlunos\Repositories\AbstractRepository;

class AlunosRepository extends AbstractRepository
{
    private $model = Aluno::class;
}