<?php

declare(strict_types=1);

define('ROOT_PATH', __DIR__ . '/../');
define('APP_PATH', ROOT_PATH. '/app');
define('CONFIG_PATH', ROOT_PATH. '/config');

require_once ROOT_PATH . '/vendor/autoload.php';

use ControleAlunos\Router;

require_once CONFIG_PATH . '/database.php';

require_once CONFIG_PATH . '/routes.php';

$router = new Router($routes, $database);
$router->run();
