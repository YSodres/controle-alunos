<?php

use ControleAlunos\Controllers\EscolasController;
use ControleAlunos\Controllers\AlunosController;

$routes = [
    'GET|/' => [EscolasController::class, 'index'],
    'GET|/cadastrar-escola' => [EscolasController::class, 'create'],
    'POST|/cadastrar-escola' => [EscolasController::class, 'store'],
    'GET|/listar-escolas' => [EscolasController::class, 'index'],
    'GET|/atualizar-escola' => [EscolasController::class, 'edit'],
    'POST|/atualizar-escola' => [EscolasController::class, 'update'],
    'GET|/obter-dados-escola' => [EscolasController::class, 'show'],

    'GET|/cadastrar-aluno' => [AlunosController::class, 'create'],
];
