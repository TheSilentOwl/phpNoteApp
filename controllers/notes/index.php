<?php

use core\App;

$db = App::resolve('core\Database');

$user_id = FindCurrentUser($db);

$notes = $db->query(
    "select * from notes where user_id = :user_id",
    [
        'user_id' => $user_id
    ]
)->findAll();



view('notes/index.view.php', [
    'notes' => $notes
]);
