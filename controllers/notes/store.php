<?php

$user_id = 1;

use core\Validator;

use core\App;

$db = App::resolve('core\Database');
$errors = [];


$validator = new Validator();

if (!Validator::email('someemail@gmial.com')) {
    dd('not a valid email');
}

if (!$validator->strCheck($_POST['note-title'], 5, 50)) {
    $errors['title'] = $validator->feedback;
    // dd($form_note_title);
}

if (!$validator->strCheck($_POST['note-body'], 10, 2000)) {
    $errors['body'] = $validator->feedback;
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
