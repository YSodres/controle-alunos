<?php

namespace ControleAlunos;

class Router
{
    private $routes;
    private $container;

    public function __construct(array $routes, Container $container)
    {
        $this->routes = $routes;
        $this->container = $container;
    }

    public function hasRoute($pathInfo, $httpMethod)
    {
        $route = "$httpMethod|$pathInfo";
        return array_key_exists($route, $this->routes);
    }

    public function run()
    {
        $pathInfo = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '/';
        $httpMethod = $_SERVER['REQUEST_METHOD'];

        if ($this->hasRoute($pathInfo, $httpMethod) == false) {
            return $this->pageNotFound();
        };

        $controllerData = $this->routes["$httpMethod|$pathInfo"];

        $nameController = $controllerData[0];
        $method = $controllerData[1];

        if (class_exists($nameController)) {
            $controller = new $nameController($this->container);
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
