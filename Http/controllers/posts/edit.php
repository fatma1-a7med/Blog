<?php
use Core\App;
use Core\Database;
use Core\Session;

$user = Session::get('user');
$userId = $user['id'];

$postId = $_GET['id'] ?? null;

if (!$postId) {
    Session::flash('error', 'Post ID is required.');
    redirect('/posts');
    exit();
}

$db = App::resolve(Database::class);
$post = $db->query('SELECT * FROM posts WHERE id = :id AND user_id = :user_id', [
    'id' => $postId,
    'user_id' => $userId,
])->find();

view("posts/edit.view.php", [
    'post' => $post
]);

