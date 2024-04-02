<?php 

namespace ControleAlunos\Controllers;

use PDO;

abstract class AbstractController
{
    public $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;

        $this->beforeAction();
    }

    /**
     * HOOK
     */
    protected function beforeAction()
    {

    }
}