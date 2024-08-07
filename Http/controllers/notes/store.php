<?php

use core\Validator;

use core\App;
use Core\Authenticator;


$user_id = Authenticator::FindCurrentUser();


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

$db = App::resolve('core\Database');

$db->query("insert into notes (title, body, user_id) values(
        :title, :body, :user_id
         )", [
    ':title' => $_POST['note-title'],
    ':body' => $_POST['note-body'],
    ':user_id' => $user_id
]);

$_POST = [];

redirect('/notes');

// dd(isset($errors));
