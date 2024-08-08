<?php

use Core\Session;

// dd(Session::getFlash('errors')['login'] ?? []);
view(
    'session/create.view.php',
    [
        'errors' => Session::get('errors'),
        'email' => old('email')
        
    ]
);
