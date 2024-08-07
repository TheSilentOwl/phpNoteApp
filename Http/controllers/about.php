<?php 

$user = $_SESSION['name'] ?? 'Guest';

 view('about.view.php', [
    'user' => $user
 ]);