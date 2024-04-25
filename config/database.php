<?php

use ControleAlunos\IoC;

$dotenv = Dotenv\Dotenv::createUnsafeImmutable(ROOT_PATH);
$dotenv->safeLoad();

$database = new IoC;
$database->pdo = function() {
    $pdo = new PDO('mysql:host=' . getenv('DATABASE_HOST') . 
    ';dbname=' . getenv('DATABASE_DB'), 
    getenv('DATABASE_USER'), 
    getenv('DATABASE_PASSWORD'));
    
    return $pdo;
};
