<?php

namespace Core\Middleware;

class Guest
{
    function handle()
    {
        if ($_SESSION['user'] ?? false) {
            header('location: /');
            exit();
        }
    }
}
