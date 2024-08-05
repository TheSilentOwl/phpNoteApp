<?php

namespace core;

use Core\Middleware\Middleware;

class Router
{
    protected $routes;
    protected function add($uri, $controller, $method, $middleware)
    {
        $this->routes[] = [
            "uri" => $uri,
            "controller" => $controller,
            "method" => $method,
            "middleware" => $middleware
        ];
        return $this;
    }
    public function get($uri, $controller)
    {
        return $this->add($uri, $controller, 'GET', null);
    }
    public function post($uri, $controller)
    {
        return $this->add($uri, $controller, 'POST', null);
    }
    public function delete($uri, $controller)
    {
        return $this->add($uri, $controller, 'DELETE', null);
    }
    public function put($uri, $controller)
    {
        return $this->add($uri, $controller, 'PUT', null);
    }
    public function patch($uri, $controller)
    {
        return $this->add($uri, $controller, 'PATCH', null);
    }

    public function only($middleware)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $middleware;
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {

                Middleware::resolve($route['middleware']);

                return require base_path($route['controller']);
            }
        }
        abort();
    }
}
