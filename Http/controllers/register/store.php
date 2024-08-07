<?php

use core\Validator;
use core\App;
use Core\Authenticator;
use core\Database;

$email = $_POST['email'];
$password = $_POST['password'];
$errors = [];
//validate the fields 

if (!Validator::email($email)) {
    $errors['email'] = Validator::$feedback;
}

if (!Validator::strCheck($password, 10, 100)) {
    $errors['password'] = Validator::$feedback;
}

if (!empty($errors)) {
    view('register/create.view.php', [
        'errors' => $errors
    ]);
    exit();
}

//check if this user already exists (db)
$db = App::resolve(Database::class);

$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();


if ($user) {
    header('location: /');
    exit();
}

$db->query('insert into users (email, password) values (:email, :password)', [
    'email' => $email,
    'password' => password_hash($password, PASSWORD_BCRYPT)
]);



Authenticator::login([
    'email' => $email
]);



redirect('/notes');


    // if so redirects them to login page
    // else add this user account to the database and log them in (sessions) and then redirect them into the home page
