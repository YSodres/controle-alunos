<?php 

namespace ControleAlunos\Controllers;

use ControleAlunos\Container;

abstract class AbstractController
{
    protected $dependecies;

    public function __construct(Container $dependecies)
    {
        $this->dependecies = $dependecies;
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
