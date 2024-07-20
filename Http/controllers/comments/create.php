<?php
use Core\App;
use Core\Database;
use Core\Session;

$postId = $_POST['post_id'];
$userId = $_SESSION['user']['id'];
$content = $_POST['content'];

$db = App::resolve(Database::class);
$db->query('INSERT INTO comments (post_id, user_id, content) VALUES (:post_id, :user_id, :content)', [
    'post_id' => $postId,
    'user_id' => $userId,
    'content' => $content,
]);

Session::flash('success', 'Comment added successfully.');
redirect("/posts");
