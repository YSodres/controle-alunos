<?php

require_once("vendor/autoload.php");

$dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__);
$dotenv->safeLoad();

$pdo = new PDO("mysql:host=" . getenv("DATABASE_HOST") . 
               ";dbname=" . getenv("DATABASE_DB"), 
               getenv("DATABASE_USER"), 
               getenv("DATABASE_PASSWORD"));