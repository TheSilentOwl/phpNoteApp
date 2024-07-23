<?php

$user_id = 1;

use core\App;

$db = App::resolve('core\Database');

// dd($_GET['user_id']);


$notes = $db->query(
    "select * from notes where user_id = :user_id",
    [
        'user_id' => $user_id
    ]
)->findAll();
// dd($_GET['id']);



view('notes/index.view.php', [
    'notes' => $notes
]);
