<?php
use Core\App;
use Core\Database;
use Core\Session;

     $user = Session::get('user');
     $userId = $user['id']??null;

        $db = App::resolve(Database::class);

        $post = $db->query('SELECT * FROM posts WHERE id = :id', [
            'id' => $_GET['id'],
        ])->find();
        $comments = $db->query('
            SELECT c.*, u.user_name, u.first_name, u.last_name, u.image 
            FROM comments c
            JOIN users u ON c.user_id = u.id
            WHERE c.post_id = :post_id', [
                'post_id' => $post['id']
        ])->findAll();

        $postAuthor = $db->query('SELECT * FROM users WHERE id = :user_id', [
            'user_id' => $post['user_id']
        ])->find();
        
       /*  echo "<pre>";
        var_dump($postAuthor);
        echo "</pre>"; */

        view("posts/show.view.php", [
            'post' => $post,
            'comments'=>$comments,
            'user'=>$user,
            'postAuthor'=>$postAuthor
        ]);

   