<?php

use core\Container;
use core\Database;
use core\App;

// service containers playground

$container = new Container();

App::setContainer($container);

App::bind('core\Database', function () {
    $configure = require base_path('configure.php');
    return new Database($configure['database']);
});


