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


function redirect($path)
{
    header('location: ' . $path);
    exit();
}

use Core\Session;
function old($key, $default = '') {
    return Session::get('old')[$key] ?? $default;
}