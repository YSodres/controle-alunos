<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use Illuminate\Database\Capsule\Manager as Capsule;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

$capsule = new Capsule;
$capsule->addConnection([
   "driver" => "mysql",
   "host" => $_ENV["DATABASE_HOST"],
   "database" => $_ENV["DATABASE_DB"],
   "username" => $_ENV["DATABASE_USER"],
   "password" => $_ENV["DATABASE_PASSWORD"]
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();