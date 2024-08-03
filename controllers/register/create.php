<?php

if ($_SESSION['user'] ?? false) {
    header('location: /');
    exit();
}

view('register/create.view.php');