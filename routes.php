<?php


$router->get('/', 'controllers/home.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');

// ----------------------------------------------------
$router->get('/notes', 'controllers/notes/index.php')->only('nothing');
$router->delete('/notes', 'controllers/notes/destroyAll.php');

$router->get('/note', 'controllers/notes/show.php')->only('auth');
$router->delete('/note', 'controllers/notes/destroy.php');
$router->get('/note/edit', 'controllers/notes/edit.php')->only('auth');
$router->patch('/note/edit', 'controllers/notes/update.php');

$router->get('/notes/create', 'controllers/notes/create.php')->only('auth');
$router->post('/notes', 'controllers/notes/store.php');

$router->get('/register', 'controllers/register/create.php')->only('guest');
$router->post('/register', 'controllers/register/store.php');