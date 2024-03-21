<?php

declare(strict_types=1);

use ControleAlunos\Router;
use ControleAlunos\controllers\RegistroEscolasController;
use ControleAlunos\controllers\ListagemEscolasController;
use ControleAlunos\controllers\AtualizacaoEscolasController;


require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__ . "/../");
$dotenv->safeLoad();

$routes = [
    '' => ListagemEscolasController::class,
    'registrar-escola' => RegistroEscolasController::class,
    'listagem-escolas' => ListagemEscolasController::class,
    'atualizar-escola' => AtualizacaoEscolasController::class
];

$request = $_SERVER['REQUEST_URI'];

$parsed_uri = parse_url($request);

$router = new Router($routes);
$router->run($parsed_uri['path']);
