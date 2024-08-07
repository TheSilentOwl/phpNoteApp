<?php

$errors = [];

use core\App;
use core\Validator;

$db = App::resolve('core\Database');

$user_id = FindCurrentUser($db);

$note = $db->query(
    "select * from notes where id = :id",
    [
        'id' => $_POST['id'],
    ]
)->findOrFail(); // the query method on the db class returns an intance of the class itself!



authorize($note['user_id'] == $user_id);

if (!Validator::strCheck($_POST['note-title'], 5, 50)) {
    $errors['title'] = Validator::$feedback;
}

if (!Validator::strCheck($_POST['note-body'], 20, 2000)) {
    $errors['body'] = Validator::$feedback;
}
// dd($request_uri);
if (!empty($errors)) {
    return view('notes/edit.view.php', [
        'errors' => $errors,
        'note' => $note
    ]);
}


$db->query('update notes set title = :title, body = :body where id = :id', [
    'id' => $_POST['id'],
    'title' => $_POST['note-title'],
    'body' => $_POST['note-body']
]);



// $_POST = [];
header('location: /notes');
exit();
