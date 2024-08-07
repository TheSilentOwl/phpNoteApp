<?php

use core\Validator;

use core\App;

$db = App::resolve('core\Database');

$user_id = FindCurrentUser($db);

$errors = [];

if (!Validator::email('someemail@gmial.com')) {
    dd('not a valid email');
}

if (!Validator::strCheck($_POST['note-title'], 5, 50)) {
    $errors['title'] = Validator::$feedback;
    // dd($form_note_title);
}

if (!Validator::strCheck($_POST['note-body'], 10, 2000)) {
    $errors['body'] = Validator::$feedback;
    // dd($form_note_body);
}


if (!empty($errors)) {
    return view('notes/create.view.php', [
        'errors' => $errors
    ]);
}

$db->query("insert into notes (title, body, user_id) values(
        :title, :body, :user_id
         )", [
    ':title' => $_POST['note-title'],
    ':body' => $_POST['note-body'],
    ':user_id' => $user_id
]);

$_POST = [];

header('location: /notes');
exit();

// dd(isset($errors));
