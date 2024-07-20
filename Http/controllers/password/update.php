<?php

use Core\App;
use Core\Database;
use Core\Session;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = App::resolve(Database::class);

    $user = Session::get('user');
    $userId = $user['id'];

    $oldPassword = $_POST['old_password'];
    $newPassword = $_POST['new_password'];

    $userRecord = $db->query('SELECT * FROM users WHERE id = :id', [
        'id' => $userId
    ])->find();

    if (password_verify($oldPassword, $userRecord['password'])) {
        $newPasswordHashed = password_hash($newPassword, PASSWORD_BCRYPT);

        $db->query('UPDATE users SET password = :password WHERE id = :id', [
            'password' => $newPasswordHashed,
            'id' => $userId
        ]);

        Session::flash('success', 'Password updated successfully.');
    } else {
        Session::flash('error', 'Old password is incorrect.');
    }

    header('Location: /profile/edit');
    exit;
}
