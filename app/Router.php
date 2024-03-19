<?php

namespace ControleAlunos;

class Router
{
    private $routes;

    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }

    public function hasRoute($pagina)
    {
        return array_key_exists($pagina, $this->routes);
    }

    public function run($pagina)
    {
        $method = $_SERVER['REQUEST_METHOD'];

        $pagina = ltrim($pagina, "/");
        
        if(self::hasRoute($pagina) == false) {
            return $this->pageNotFound();
        };

        $nameController = $this->routes[$pagina];
        if (class_exists($nameController)) {
            $controller = new $nameController;
            if (method_exists($controller, $method)) {
                $controller->$method();
            } else {
                return $this->pageNotFound();
            }
        } else {
            return $this->pageNotFound();
        }
    }
    
    public function pageNotFound()
    {
        http_response_code(404);
    }
}