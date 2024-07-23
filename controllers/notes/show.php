<?php

$user_id = 1;

use core\App;

$db = App::resolve('core\Database');
// dd($_GET['user_id']);

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
