<?php

namespace Core\Middleware;

class Auth
{
    function handle()
    {
        if (!$_SESSION['user'] ?? false) {
            header('location: /');
            exit();
        }
    }
}
