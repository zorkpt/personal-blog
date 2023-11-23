<?php
const BASE_DIR = __DIR__ . '../../';
require '../../vendor/autoload.php';
use Core\Router;

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__, 2));
$dotenv->load();

require BASE_DIR . '/Core/Router.php';
require BASE_DIR . '/Core/Database.php';
require BASE_DIR . '/Core/functions.php';
require BASE_DIR . '/Core/Post.php';

$router = new Router();
require BASE_DIR . 'routes.php';

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

// if there's another method other than GET or POST
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);
