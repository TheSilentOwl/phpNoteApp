<?php

use Core\Authenticator;
use Core\Session;
use Http\Forms\Loginform;

$email = trim($_POST['email']);
$password = $_POST['password'];


$loginform = new Loginform();

if ($loginform->validate($email, $password)) {

    if ((new Authenticator)->attempt($email, $password)) {
        redirect('/notes');
    } else {
        $loginform->setError('login', 'your email address and/or password is wrong');
    }
}

Session::flash('errors', $loginform->getErrors());
Session::flash('old', [
    'email' => $email
]);

// dd($_SESSION);

// dd($_SESSION);

// $_SESSION['_flash']['errors']['login'] = $loginform->getErrors();

redirect('/session/create');
// return view('session/create.view.php', [
//     'errors' => $loginform->getErrors()
// ]);
