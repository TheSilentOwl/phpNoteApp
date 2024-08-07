<?php

namespace Core\Middleware;

use Core\Middleware\Auth;
use Core\Middleware\Guest;

class Middleware
{
    const Map = [
        'auth' => Auth::class,
        'guest' => Guest::class
    ];

    static function resolve($key)
    {
        if (!$key) { // if no middleware provided exit
            return;
        }
        
        $middleware = static::Map[$key] ?? false; 

        // if middleware provided, but does not exist in Map throw an exception

        if (!$middleware) {
            throw new \Exception("This $middleware does not exist");
        }

        (new $middleware)->handle(); // otherwise: googd to go
    }
}
