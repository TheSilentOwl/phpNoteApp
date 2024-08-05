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
        $middleware = static::Map[$key] ?? false;

        if ($middleware) {
            (new $middleware)->handle();
        }
    }
}
