<?php

use Core\App;
use Core\Database;
use Core\Session;

// Retrieve form inputs
$email = $_POST['email'];
$userName = $_POST['user_name'];
$firstName = $_POST['first_name'];
$lastName = $_POST['last_name'];
$phoneNumber = $_POST['phone_number'];
$address = $_POST['address'];
$userId = $_SESSION['user']['id'];

$db = App::resolve(Database::class);

try {
    $db->query('UPDATE users SET email = :email, user_name = :user_name , first_name = :first_name , last_name= :last_name , phone_number = :phone_number, address = :address WHERE id = :id', [
        'email' => $email,
        'phone_number' => $phoneNumber,
        'user_name' => $userName,
        'first_name' => $firstName,
        'last_name' => $lastName,
        'address' => $address,

        'id' => $userId,
    ]);
} catch (Exception $e) {
    Session::flash('error', 'Failed to update profile: ' . $e->getMessage());
    redirect('/profile/edit');
    exit();
}

if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $imagePath = 'assets/images/users/' . basename($_FILES['image']['name']);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
        try {
            $db->query('UPDATE users SET image = :image WHERE id = :id', [
                'image' => $imagePath,
                'id' => $userId,
            ]);
        } catch (Exception $e) {
            Session::flash('error', 'Failed to update profile image: ' . $e->getMessage());
            redirect('/profile/edit');
            exit();
        }
    } else {
        Session::flash('error', 'Failed to upload image. Please try again.');
        redirect('/profile/edit');
        exit();
    }
}

Session::flash('success', 'Profile updated successfully.');
redirect('/profile/edit');

