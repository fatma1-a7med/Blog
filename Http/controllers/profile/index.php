<?php

use Core\App;
use Core\Database;
use Core\Session;

$user = Session::get('user');
$userId = $user['id'];

$db= App::resolve(Database::class);
     
    $users= $db->query('select * from users where id=:id',
    [
        'id'=>$userId
    ])->find();
    $posts= $db->query('select * from posts where user_id=:id',
    [
        'id'=>$userId
    ])->findAll();
    
    /* echo "<pre>";
    var_dump($users);
    echo "</pre>"; */

    view('profile/index.view.php',
    [
        'users' => $users,
        'posts'=>$posts
    ]
);

