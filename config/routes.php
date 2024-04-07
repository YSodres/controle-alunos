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
    'DELETE|/excluir-escola' => [EscolasController::class, 'delete'],

    'GET|/cadastrar-aluno' => [AlunosController::class, 'create'],
    'POST|/cadastrar-aluno' => [AlunosController::class, 'store'],
    'GET|/listar-alunos' => [AlunosController::class, 'index'],
    'GET|/atualizar-aluno' => [AlunosController::class, 'edit'],
    'POST|/atualizar-aluno' => [AlunosController::class, 'update'],
    'GET|/obter-dados-aluno' => [AlunosController::class, 'show'],
    'DELETE|/excluir-aluno' => [AlunosController::class, 'delete'],
];
