<?php

use Core\App;
use Core\Authenticator;
use Core\Database;
use Core\Session;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];
$rememberMe = $_POST['remember_me'];


$form = new LoginForm();

if ($form->validate($email, $password)) {
    if ((new Authenticator)->attempt($email, $password)) {
        if ($rememberMe) {
            // Generate a unique token
            $token = bin2hex(random_bytes(16));
            // Set the cookie to expire in 30 days
            setcookie('rememberMe', $token, time() + (86400 * 30), "/");
            
            // Save the token to the database
            $db = App::resolve(Database::class);
            $db->query('UPDATE users SET remember_token = :token WHERE email = :email', [
                'token' => $token,
                'email' => $email
            ]);
        }
        redirect('/');
    }
    
    $form->error('email', 'No matching account found for that email address and password.');
}
Session::flash('errors',$form->errors());
Session::flash('old', [
    'email' => $_POST['email']
]);
redirect('/login');
