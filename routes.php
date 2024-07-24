<?php


$router->get('/', 'controllers/home.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');

// ----------------------------------------------------
$router->get('/notes', 'controllers/notes/index.php');
$router->delete('/notes', 'controllers/notes/destroyAll.php');

$router->get('/note', 'controllers/notes/show.php');
$router->delete('/note', 'controllers/notes/destroy.php');
$router->get('/note/edit', 'controllers/notes/edit.php');
$router->patch('/note/edit', 'controllers/notes/update.php');

$router->get('/notes/create', 'controllers/notes/create.php');
$router->post('/notes', 'controllers/notes/store.php');

$router->get('/register', 'controllers/register/create.php');
$router->post('/register', 'controllers/register/store.php');