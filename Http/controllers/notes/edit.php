<?php

use Core\Authenticator;
use core\App;


$db = App::resolve('core\Database');

$user_id = Authenticator::FindCurrentUser();

$note = $db->query(
    "select * from notes where id = :id",
    [
        'id' => $_GET['id'],
    ]
)->findOrFail(); // the query method on the db class returns an intance of the class itself!



authorize($note['user_id'] === $user_id);

$errors = [];

view('notes/edit.view.php', [
    'note' => $note,
    'errors' => $errors
]);
