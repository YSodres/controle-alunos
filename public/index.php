<?php

declare(strict_types=1);

define('APP_PATH', __DIR__ . '/../app');
define('CONFIG_PATH', __DIR__ . '/../config');
define('ROOT_PATH', __DIR__ . '/../');

require_once ROOT_PATH . '/vendor/autoload.php';

use ControleAlunos\Router;

require_once CONFIG_PATH . '/database.php';

require_once CONFIG_PATH . '/routes.php';

$pathInfo = $_SERVER['PATH_INFO'] ?? '/';
$httpMethod = $_SERVER['REQUEST_METHOD'];

$controllerData = $routes["$httpMethod|$pathInfo"];

$router = new Router($routes, ['database' => $database]);
$router->run($controllerData);
