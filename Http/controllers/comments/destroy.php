<?php

use Core\App;
use Core\Database;
use Core\Session;

$user = Session::get('user');
$userId = $user['id'];

$db = App::resolve(Database::class);

if ( $_POST['_method'] === 'DELETE') {
    if (isset($_POST['delete_comment_id'])) {
        $commentId = $_POST['delete_comment_id'];
   
        $deleted = $db->query("DELETE FROM comments WHERE id = :id AND user_id = :user_id", [
            'id' => $commentId,
            'user_id' => $userId
        ]);

        if ($deleted) {
          
            Session::flash('success', 'Comment deleted successfully.');
           
        } else {
           
            Session::flash('error', 'Failed to delete the comment.');
        }
 
        redirect("/posts");
    } else {
        Session::flash('error', 'Comment ID not provided.');
        redirect("/posts");
    }
} else {

    Session::flash('error', 'Invalid request method.');
    redirect("/posts");
}
