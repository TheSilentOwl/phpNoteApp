<?php

use core\Database;
use core\Validator;

$user_id = 1;
$configure = require base_path('configure.php');
$db = new Database($configure['database']);
$errors = [];


// require base_path('core/Validator.php');
$validator = new Validator();

if (!Validator::email('someemail@gmial.com')) {
    dd('not a valid email');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // dd($_POST);

    if (!$validator->strCheck($_POST['note-title'], 5, 50)) {
        $errors['title'] = $validator->feedback;
        // dd($form_note_title);
    }
    // if (strlen($_POST['note-title']) > 50) {
    //     $errors['title'] = $validator->feedback;
    //     // dd($form_note_title);
    // }
    if (!$validator->strCheck($_POST['note-body'], 10, 2000)) {
        $errors['body'] = $validator->feedback;
        // dd($form_note_body);
    }
    // if (strlen($_POST['note-body']) > 1000) {
    //     $errors['body'] = $validator->feedback;
    //     // dd($form_note_title);
    // }
    // dd("note title: {$_POST['note-title']}, note body:{$_POST['note-body']}");
    // dd(count($errors));

    if (empty($errors)) {
        $db->query("insert into notes (title, body, user_id) values(
        :title, :body, :user_id
         )", [
            ':title' => $_POST['note-title'],
            ':body' => $_POST['note-body'],
            ':user_id' => $user_id
        ]);
        $_POST = [];
    }
    // dd(isset($errors));

}


 view('notes/create.view.php', [
    'errors' => $errors
 ]);
