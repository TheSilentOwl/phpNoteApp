<?php


use core\App;
use Core\Authenticator;


$db = App::resolve('core\Database');

$user_id = Authenticator::FindCurrentUser();

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
