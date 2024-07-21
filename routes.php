<?php


$router->get('/', 'controllers/home.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');

// ----------------------------------------------------
$router->get('/notes', 'controllers/notes/index.php');
$router->delete('/notes', 'controllers/notes/destroyAll.php');

$router->get('/note', 'controllers/notes/show.php');
$router->delete('/note', 'controllers/notes/destroy.php');

$router->get('/notes/create', 'controllers/notes/create.php');
$router->post('/notes', 'controllers/notes/store.php');