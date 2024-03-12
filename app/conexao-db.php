<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once(__DIR__ . "/../vendor/autoload.php");
use Illuminate\Database\Capsule\Manager as Capsule;

$dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__);
$dotenv->safeLoad();

$capsule = new Capsule;
$capsule->addConnection([
   "driver" => "mysql",
   "host" =>  getenv("DATABASE_HOST"),
   "database" =>  getenv("DATABASE_DB"),
   "username" =>  getenv("DATABASE_USER"),
   "password" =>  getenv("DATABASE_PASSWORD")
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();

var_dump($capsule);
exit();