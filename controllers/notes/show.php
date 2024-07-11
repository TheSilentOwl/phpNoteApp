<?php

use core\Database;

$user_id = 1;

$configure = require base_path('configure.php');
$db = new Database($configure['database']);
// dd($_GET['user_id']);
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $note = $db->query(
        "select * from notes where id = :id", [
            'id' => $_GET['id']
        ]
    )->findOrFail();

    authorize($note['user_id'] === $user_id);

    $db->query('delete from notes where id = :id', [
        'id' => $note['id']
    ]);
    header('location: /notes');



} else {
    $note = $db->query(
        "select * from notes where id = :id",
        [
            'id' => $_GET['id'],
        ]
    )->findOrFail(); // the query method on the db class returns an intance of the class itself!



    authorize($note['user_id'] == $user_id);


    view('notes/show.view.php', [
        'note' => $note
    ]);
}
