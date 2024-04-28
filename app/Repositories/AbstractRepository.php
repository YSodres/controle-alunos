<?php

namespace ControleAlunos\Repositories;

use ControleAlunos\Container;
use PDO;
use Exception;

abstract class AbstractRepository
{
    protected $database;

    public function __construct(Container $container)
    {   
        if (!$container->database instanceof PDO) {
            throw new Exception("Objeto PDO não encontrado");
        }

        $this->database = $container->database;
    }
}
