<?php

namespace Core;

use core\Database;


class Authenticator
{
    function attempt($email, $password)
    {
        $db = App::resolve(Database::class);

        $user = $db->query('select * from users where email = :email', [
            'email' => $email
        ])->find();


        if ($user) {
            if (password_verify($password, $user['password'])) {
                static::login([
                    'email' => $email
                ]);
                return true;
            }
        }
        return false;
    }

    static function login($user)
    {
        $_SESSION['user'] = [
            'email' => $user['email']
        ];

        session_regenerate_id(true);
    }

    static function logout()
    {
        Session::flush();// clear the session superglobal

        session_destroy(); // destroy the server session file

        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly'],); // destroy the cookie file on the client

        
    }

    static function FindCurrentUser()
    {
        $db = App::resolve(Database::class);
        $user = $db->query('select * from users where email = :email', [
            'email' => $_SESSION['user']['email']
        ])->find();

        return $user['id'];
    }
}
