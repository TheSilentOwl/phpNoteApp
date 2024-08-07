<?php

use core\App;

$db = App::resolve('core\Database');

$user_id = FindCurrentUser($db);

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

header('location: /notes');
exit();
