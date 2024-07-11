<?php
use core\Response;
function dd($param)
{
    echo '<pre>';
    var_dump($param);
    echo '</pre>';
    die();
}

function abort($code=Response::NOT_FOUND) {
    http_response_code($code);
    view("$code.php");
    die();
}

function authorize($condition, $status=Response::FORBIDDEN) {
    if (!$condition) {
        abort($status);
    }  
}

function base_path($path){
    return BASE_PATH . $path;
}

function view($path, $data=[]) {
    extract($data);
    require base_path("views/$path");
}