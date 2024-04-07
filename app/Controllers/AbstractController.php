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

    protected function render($view, $params = [])
    {
        extract($params);
        require_once APP_PATH . "/Views/$view.php";
    }

    protected function redirectTo($pagina)
    {
        header("Location: $pagina");
        exit();
    }
}