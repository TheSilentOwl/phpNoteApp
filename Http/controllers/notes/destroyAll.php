<?php


use core\App;
use Core\Authenticator;

$db = App::resolve('core\Database');

$user_id = Authenticator::FindCurrentUser();

$notes = $db->query(
    "select * from notes where user_id = :user_id",
    [
        'user_id' => $user_id
    ]
)->findAll();

if (!empty($notes)) {

    authorize($notes[0]['user_id'] === $user_id);
    $db->query(
        'delete from notes where user_id = :user_id',
        [
            'user_id' => $user_id
        ]
    );
    redirect('/notes');

} else {

    abort();

}
