<?php

$dotenv = Dotenv\Dotenv::createUnsafeImmutable(ROOT_PATH);
$dotenv->safeLoad();

$container->database = function() {
    $database = new PDO('mysql:host=' . getenv('DATABASE_HOST') . 
    ';dbname=' . getenv('DATABASE_DB'), 
    getenv('DATABASE_USER'), 
    getenv('DATABASE_PASSWORD'));
    
    return $database;
};
