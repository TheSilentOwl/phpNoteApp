<?php

use core\Response;

function dd($param)
{
    echo '<pre>';
    var_dump($param);
    echo '</pre>';
    die();
}

function urlIs($url)
{
    // $url ??= false;
    return $_SERVER['REQUEST_URI'] === $url;
}

function abort($code = Response::NOT_FOUND)
{
    http_response_code($code);
    view("$code.php");
    die();
}

function authorize($condition, $status = Response::FORBIDDEN)
{
    if (!$condition) {
        abort($status);
    }
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $data = [])
{
    extract($data);
    require base_path("views/$path");
}

function login($user)
{
    $_SESSION['user'] = [
        'email' => $user['email']
    ];

    session_regenerate_id(true);
}

function logout()
{
    $_SESSION = []; // clear the session superglobal

    session_destroy(); // destroy the server session file

    $params = session_get_cookie_params();
    setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly'],); // destroy the cookie file on the client

    header('location: /');
    exit();
}

function FindCurrentUser($db)
{
    $user = $db->query('select * from users where email = :email', [
        'email' => $_SESSION['user']['email']
    ])->find();

    return $user['id'];
}
