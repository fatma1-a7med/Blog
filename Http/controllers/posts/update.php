<?php

use Core\App;
use Core\Database;
use Core\Session;

$db = App::resolve(Database::class);
$postId = $_POST['id'];

$title = $_POST['title'];
$content = $_POST['content'];
$imagePath = null;

if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $imagePath = 'assets/images/posts/' . basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
}

$query = 'UPDATE posts SET title = :title, content = :content';
$params = [
    'title' => $title,
    'content' => $content,
];

if ($imagePath !== null) {
    $query .= ', image = :image';
    $params['image'] = $imagePath;
}

$query .= ' WHERE id = :id';
$params['id'] = $postId;

$result = $db->query($query, $params);

if ($result) {
    Session::flash('success', 'Post updated successfully.');
} else {
    Session::flash('error', 'Failed to update post.');
}

redirect('/post?id=' . $postId);
exit();
