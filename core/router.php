<?php

$routes = require base_path('routes.php');
function controllerToRoute($uri, $routes) {
    if (array_key_exists($uri, $routes)) {
        require base_path($routes[$uri]);
    } else {
        abort(404);
    }
}


$request_uri = parse_url($_SERVER['REQUEST_URI'])['path'];

controllerToRoute($request_uri, $routes);

