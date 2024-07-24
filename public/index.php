<?php
const BASE_PATH = __DIR__ . "/../";
// var_dump(BASE_PATH);

require BASE_PATH . 'core/' . 'functions.php';

spl_autoload_register(
    function ($class) {
        $class = str_replace('\\', '/', $class);
        require base_path($class . '.php');
    }
);

require base_path('bootstrap.php');

// start session
session_start();

require  base_path('core/router.php');

$router = new core\Router();

$routes = require base_path('routes.php');

$request_uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
// dd($request_uri);
// dd($method);
// dd($_POST);
// count($_POST) !== 0? dd($_SERVER['REQUEST_METHOD']): true;
$router->route($request_uri, $method);
