<?php

namespace ControleAlunos\Repositories;

use ControleAlunos\Container;
use PDO;
use Exception;

abstract class AbstractRepository
{
    protected $pdo;

    public function __construct(Container $dependecies)
    {   
        if (!$dependecies->pdo instanceof PDO) {
            throw new Exception("Objeto PDO não encontrado");
        }

        $this->pdo = $dependecies->pdo;
    }
}
