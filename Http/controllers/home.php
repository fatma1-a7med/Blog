<?php

use Core\App;
use Core\Database;
use Core\Session;

$user = Session::get('user');
$userId = $user['id']??null;

$db = App::resolve(Database::class);

// Fetch all posts
$posts = $db->query('
    SELECT p.*, u.first_name, u.last_name, u.image AS user_image
    FROM posts p
    JOIN users u ON p.user_id = u.id
')->findAll();

$commentsByPost = [];

// Fetch comments for each post
foreach ($posts as $post) {
    $comments = $db->query('
        SELECT c.*, u.first_name, u.last_name, u.user_name, u.image 
        FROM comments c
        JOIN users u ON c.user_id = u.id
        WHERE c.post_id = :post_id', [
            'post_id' => $post['id']
    ])->findAll();
 /*    echo "<pre>";
    var_dump($comments);
    echo "</pre>"; */
    $commentsByPost[$post['id']] = $comments;
}

// Load the view
view("home.view.php", [
    'posts' => $posts,
    'commentsByPost' => $commentsByPost,
    'user' => $user
]);
