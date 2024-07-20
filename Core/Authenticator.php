<?php

namespace Core;

class Authenticator
{
    public function attempt($email, $password)
    {
        $user = App::resolve(Database::class)
            ->query('SELECT * FROM users WHERE email = :email', [
                'email' => $email
            ])->find();
    
    
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $this->login($user);
                return true;
            }
        }
    
        return false;
    }
    

    public function login($user)
    {
        $_SESSION['user'] = [
            'email' => $user['email'],
            'image' => $user['image'], 
            'id' => $user['id'],
            'userName' => $user['user_name'],
            'firstName' => $user['first_name'],
            'lastName' => $user['last_name'],
            'createdAt' => $user['created_at'],
        ];

        session_regenerate_id(true);
    }

    public function logout()
    {
        Session::destroy();
        setcookie('rememberMe', '', time() - 3600, "/");
    }

    public function checkRememberMe()
    {
        if (isset($_COOKIE['rememberMe'])) {
            $token = $_COOKIE['rememberMe'];

            $user = App::resolve(Database::class)
                ->query('SELECT * FROM users WHERE remember_token = :token', [
                    'token' => $token
                ])->find();

            if ($user) {
                $this->login($user);
                return true;
            }
        }

        return false;
    }
}
