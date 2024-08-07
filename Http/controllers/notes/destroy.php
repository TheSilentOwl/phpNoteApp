<?php

use core\App;
use Core\Authenticator;

$db = App::resolve('core\Database');

$user_id = Authenticator::FindCurrentUser();

$note = $db->query(
    "select * from notes where id = :id",
    [
        'id' => $_POST['id']
    ]
)->findOrFail();

authorize($note['user_id'] === $user_id);

$db->query('delete from notes where id = :id', [
    'id' => $note['id']
]);

redirect('/notes');