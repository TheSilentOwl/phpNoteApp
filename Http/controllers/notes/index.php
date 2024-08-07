<?php

use core\App;
use Core\Authenticator;


$db = App::resolve('core\Database');

$user_id = Authenticator::FindCurrentUser();

$notes = $db->query(
    "select * from notes where user_id = :user_id",
    [
        'user_id' => $user_id
    ]
)->findAll();



view('notes/index.view.php', [
    'notes' => $notes
]);
