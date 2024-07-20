<?php

use Core\App;
use Core\Database;
use Http\Forms\PostForm;
use Core\Session;

$title = $_POST['title'] ?? '';
$content = $_POST['content'] ?? '';
$image = $_FILES['image'] ?? null;
$user = Session::get('user');
$userId = $user['id'] ?? null;

var_dump('Form Submitted:', $_SERVER['REQUEST_METHOD'] === 'POST');
var_dump('User:', $user);
var_dump('Title:', $title);
var_dump('Content:', $content);
var_dump('Image:', $_FILES['image']);

$form = new PostForm();
$db = App::resolve(Database::class);

if ($form->validate($title, $content, $image)) {
    $imagePath = 'assets/images/posts/' . basename($image['name']);
    
    if (!move_uploaded_file($image['tmp_name'], $imagePath)) {
        $form->error('image', 'Failed to upload image.');
    }

    $db->query('INSERT INTO posts (title, content, user_id, image) VALUES (:title, :content, :user_id, :image)', [
        'title' => $title,
        'content' => $content,
        'user_id' => $userId,
        'image' => $imagePath
    ]);

    Session::flash('success', 'Post created successfully!');
    redirect('/posts');
} else {

    Session::flash('errors', $form->errors());
    var_dump($form->errors());

    Session::flash('old', [
        'title' => $title,
        'content' => $content,
        'image' => $image
    ]);
    Session::flash('error', 'Failed to create post. Please correct the errors.');
    redirect('/posts/create');
}
ob_flush();

