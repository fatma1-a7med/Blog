<?php
use Core\App;
use Core\Database;
use Core\Session;

$db = App::resolve(Database::class);
$postId = $_POST['id'];

$db->query('DELETE FROM posts WHERE id = :id', [
    'id' => $postId,
]);

Session::flash('success', 'Post deleted successfully.');
redirect('/posts');

