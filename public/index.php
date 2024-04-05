<?php

declare(strict_types=1);

use ControleAlunos\Router;
use ControleAlunos\Controllers\EscolasController;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__ . "/../");
$dotenv->safeLoad();

$routes = [
    'GET|/' => [EscolasController::class, 'index'],
    'GET|/cadastrar-escola' => [EscolasController::class, 'create'],
    'POST|/cadastrar-escola' => [EscolasController::class, 'store'],
    'GET|/listar-escolas' => [EscolasController::class, 'index'],
    'GET|/atualizar-escola' => [EscolasController::class, 'edit'],
    'POST|/atualizar-escola' => [EscolasController::class, 'update'],
    'GET|/obter-dados-escola' => [EscolasController::class, 'show'],

    'GET|/cadastrar-aluno' => [EscolasController::class, 'create'],
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
