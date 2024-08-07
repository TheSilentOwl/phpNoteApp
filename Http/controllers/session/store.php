<?php

use Core\Authenticator;
use Http\Forms\Loginform;

$email = trim($_POST['email']);
$password = $_POST['password'];


$loginform = new Loginform();

if ($loginform->validate($email, $password)) {
    $auth = new Authenticator();

    if ($auth->attempt($email, $password)) {
        redirect('/notes');
    } else {
        $loginform->setError('login', 'your email address and/or password is wrong');
    }
}



return view('session/create.view.php', [
    'errors' => $loginform->getErrors()
]);
