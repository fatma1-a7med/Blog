<?php
define('BASE_PATH', __DIR__ . '/../');

session_start();
require BASE_PATH . 'Core/functions.php';
require BASE_PATH . 'Core/Router.php';
require BASE_PATH . 'Core/Validator.php';
require BASE_PATH . 'bootstrap.php';
require BASE_PATH . 'Core/Session.php';

require BASE_PATH . 'vendor/autoload.php';

$router = new \Core\Router();
$routes = require base_path('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);
