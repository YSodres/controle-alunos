<?php

use ControleAlunos\Container;

$dotenv = Dotenv\Dotenv::createUnsafeImmutable(ROOT_PATH);
$dotenv->safeLoad();

$dependencies = new Container;
$dependencies->pdo = function() {
    $pdo = new PDO('mysql:host=' . getenv('DATABASE_HOST') . 
    ';dbname=' . getenv('DATABASE_DB'), 
    getenv('DATABASE_USER'), 
    getenv('DATABASE_PASSWORD'));
    
    return $pdo;
};
