<?php

use core\App;
use core\Database;
use core\Validator;

$email = trim($_POST['email']);
$password = $_POST['password'];

$errors = [];

if (!Validator::email($email)) {
    $errors['login'] = 'your email is not even in shape';
}
if (!Validator::strCheck($password)) {
    $errors['login'] = 'password should be provided';
}
if (!empty($errors)) {
    return view('session/create.view.php', [
        'errors' => $errors
    ]);
}

$db = App::resolve(Database::class);

$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();


if ($user) {
    if (password_verify($password, $user['password'])) {
        login([
            'email' => $email
        ]);

        header('location: /');
        exit();
    }
}

$errors['login'] = 'your email address and/or password is wrong';
return view('session/create.view.php', [
    'errors' => $errors
]);
