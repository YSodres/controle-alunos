<?php

require_once(__DIR__ . "/../vendor/autoload.php");

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

$pdo = new PDO("mysql:host=" . $_ENV['DATABASE_HOST'] . ";dbname=" . $_ENV['DATABASE_DB'],
     $_ENV['DATABASE_USER'],
     $_ENV['DATABASE_PASSWORD']);