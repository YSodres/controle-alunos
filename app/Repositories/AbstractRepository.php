<?php

namespace ControleAlunos\Repositories;

use ControleAlunos\Container;
use PDO;
use Exception;

abstract class AbstractRepository
{
    protected $pdo;

    public function __construct(Container $container)
    {   
        if (!$container->pdo instanceof PDO) {
            throw new Exception("Objeto PDO não encontrado");
        }

        $this->pdo = $container->pdo;
    }
}
