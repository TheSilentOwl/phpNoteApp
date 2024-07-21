<?php

use core\Database;

$user_id = 1;
$configure = require base_path('configure.php');
$db = new Database($configure['database']);

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
