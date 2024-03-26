<?php

declare(strict_types=1);

use ControleAlunos\Router;
use ControleAlunos\Controllers\RegistroEscolasController;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__ . "/../");
$dotenv->safeLoad();

$routes = [
    '' => RegistroEscolasController::class,
    'registrar-escola' => RegistroEscolasController::class
];

$request = $_SERVER['REQUEST_URI'];

$parsed_uri = parse_url($request);

$database = new PDO("mysql:host=" . getenv("DATABASE_HOST") . 
               ";dbname=" . getenv("DATABASE_DB"), 
               getenv("DATABASE_USER"), 
               getenv("DATABASE_PASSWORD"));

$router = new Router($routes, ['database' => $database]);
$router->run($parsed_uri['path']);
