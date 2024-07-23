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

require  base_path('core/router.php');

$router = new core\Router();

$routes = require base_path('routes.php');

$request_uri = parse_url($_SERVER['REQUEST_URI'])['path'];
// dd($request_uri);

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
// count($_POST) !== 0? dd($_SERVER['REQUEST_METHOD']): true;
$router->route($request_uri, $method);
