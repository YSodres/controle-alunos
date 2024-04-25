<?php 

namespace ControleAlunos\Controllers;

use PDO;

abstract class AbstractController
{
    public function __construct(public PDO $pdo)
    {
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

    protected function renderJson($response)
    {
        header('Content-Type: application/json');
        echo json_encode($response);
        exit();
    }
}