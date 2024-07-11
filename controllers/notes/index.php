<?php

use core\Database;

$user_id = 1;
$configure = require base_path('configure.php');
$db = new Database($configure['database']);

// dd($_GET['user_id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $notes = $db->query(
        "select * from notes where user_id = :user_id",
        [
            'user_id' => $user_id
        ]
    )->findAll();
    authorize($notes[0]['user_id'] == $user_id);
    $db->query(
        'delete from notes where user_id = :user_id',
        [
            'user_id' => $user_id
        ]
    );
    header('location: /notes');
} else {
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
}
