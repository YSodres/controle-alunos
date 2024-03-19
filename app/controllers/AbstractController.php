<?php 

namespace ControleAlunos\controllers;

use PDO;

abstract class AbstractController
{
    public $pdo;

    public function __construct()
    {
        require_once __DIR__ . "/../Database.php";

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