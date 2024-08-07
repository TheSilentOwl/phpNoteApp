<?php


$router->get('/', 'home.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');

// ----------------------------------------------------
$router->get('/notes', 'notes/index.php')->only('auth');
$router->delete('/notes', 'notes/destroyAll.php');

$router->get('/note', 'notes/show.php')->only('auth');
$router->delete('/note', 'notes/destroy.php');
$router->get('/note/edit', 'notes/edit.php')->only('auth');
$router->patch('/note/edit', 'notes/update.php');

$router->get('/notes/create', 'notes/create.php')->only('auth');
$router->post('/notes', 'notes/store.php');

$router->get('/register', 'register/create.php')->only('guest');
$router->post('/register', 'register/store.php');

$router->get('/session/create', 'session/create.php')->only('guest');
$router->post('/session', 'session/store.php')->only('guest');
$router->delete('/session', 'session/destroy.php')->only('auth');
