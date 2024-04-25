<?php

namespace ControleAlunos\Repositories;

use PDO;

abstract class AbstractRepository
{

    public function __construct(protected PDO $pdo)
    {

    }
}