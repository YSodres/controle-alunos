<?php

declare(strict_types=1);

use ControleAlunos\Router;
use ControleAlunos\Controllers\EscolasController;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__ . "/../");
$dotenv->safeLoad();

$routes = [
    'GET|/' => [EscolasController::class, 'index'],
    'GET|/registrar-escola' => [EscolasController::class, 'index'],
    'POST|/registrar-escola' => [EscolasController::class, 'store'],
    'GET|/listagem-escolas' => [EscolasController::class, 'index'],
    'GET|/atualizar-escola' => [EscolasController::class, 'index'],
    'POST|/atualizar-escola' => [EscolasController::class, 'update'],
    'POST|/obter-dados-escola' => [EscolasController::class, 'find']
];

$pathInfo = $_SERVER['PATH_INFO'] ?? '/';
$httpMethod = $_SERVER['REQUEST_METHOD'];

$controllerData = $routes["$httpMethod|$pathInfo"];

$database = new PDO("mysql:host=" . getenv("DATABASE_HOST") . 
               ";dbname=" . getenv("DATABASE_DB"), 
               getenv("DATABASE_USER"), 
               getenv("DATABASE_PASSWORD"));

$router = new Router($routes, ['database' => $database]);
$router->run($controllerData);
