<?php

use core\Database;

$user_id = 1;

$configure = require base_path('configure.php');
$db = new Database($configure['database']);


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
