<?php

use Core\Router;

const BASE_DIR = __DIR__ . '../../';

require BASE_DIR . '/Core/Router.php';
require BASE_DIR . '/Core/functions.php';

$router = new Router();
require BASE_DIR . 'routes.php';

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

// if there's another method other than GET or POST
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];


    $router->route($uri, $method);

