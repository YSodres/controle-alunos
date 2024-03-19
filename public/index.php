<?php

declare(strict_types=1);

use ControleAlunos\Router;
use ControleAlunos\controllers\RegistroEscolasController;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__ . "/../");
$dotenv->safeLoad();

$routes = [
    '' => RegistroEscolasController::class,
    'registrar-escola' => RegistroEscolasController::class
];

$request = $_SERVER['REQUEST_URI'];

$parsed_uri = parse_url($request);

$router = new Router($routes);
$router->run($parsed_uri['path']);
