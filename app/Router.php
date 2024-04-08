<?php

namespace ControleAlunos;

class Router
{
    private $routes;
    private $dependencies;

    public function __construct(array $routes, array $dependecies = [])
    {
        $this->routes = $routes;
        $this->dependencies = $dependecies;
    }

    public function hasRoute()
    {
        $pathInfo = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '/';
        $httpMethod = $_SERVER['REQUEST_METHOD'];

        $route = "$httpMethod|$pathInfo";
        return array_key_exists($route, $this->routes);
    }

    public function run($controllerData)
    {
        $nameController = $controllerData[0];
        $method = $controllerData[1];

        if ($this->hasRoute() == false) {
            return $this->pageNotFound();
        };

        if (class_exists($nameController)) {
            $controller = new $nameController($this->dependencies['database']);
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
