<?php
const BASE_PATH = __DIR__ . "/../";
// var_dump(BASE_PATH);

require BASE_PATH . 'core/' . 'functions.php';

spl_autoload_register(
    function ($class) {
        $class = str_replace('\\', '/', $class);
        require base_path($class . '.php');
    }
);

require  base_path('core/router.php');
