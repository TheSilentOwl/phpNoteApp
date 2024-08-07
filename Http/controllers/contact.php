<?php

$user = $_SESSION['name'] ?? 'Guest';

view('contact.view.php', [
    'user' => $user
]);
