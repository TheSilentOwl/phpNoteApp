<?php



$user_id = 1;

use core\App;

$db = App::resolve('core\Database');


$notes = $db->query(
    "select * from notes where user_id = :user_id",
    [
        'user_id' => $user_id
    ]
)->findAll();

if (!empty($notes)) {
authorize($notes[0]['user_id'] == $user_id);

$db->query(
    'delete from notes where user_id = :user_id',
    [
        'user_id' => $user_id
    ]
);

header('location: /notes');
exit();
} else {
    abort(); 
}