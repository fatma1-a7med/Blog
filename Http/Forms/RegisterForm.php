<?php

namespace Http\Forms;

use Core\App;
use Core\Database;
use Core\Validator;
use Exception;

class RegisterForm
{
    protected $db;
    protected $data;
    protected $errors = [];
    
    public function __construct($data)
    {
        $this->db = App::resolve(Database::class);
        $this->data = $this->sanitizeData($data);
    }
    
    protected function sanitizeData($data)
    {
        return [
            'email' => trim($data['email']),
            'password' => trim($data['password']),
            'first_name' => trim($data['first_name']),
            'last_name' => trim($data['last_name']),
            'user_name' => trim($data['user_name']),
            'phone_number' => trim($data['phone_number']),
            'address' => trim($data['address']),
            'image' => $data['image'] ?? null,
        ];
    }

    public function validate()
    {
        if (!Validator::email($this->data['email'])) {
            $this->errors['email'] = 'Please provide a valid email address.';
        }
        
        if (!Validator::string($this->data['password'], 7, 255)) {
            $this->errors['password'] = 'Please provide a password of at least seven characters.';
        }
        
        if (!Validator::string($this->data['first_name'], 1, 50, ctype_alpha($this->data['first_name']))) {
            $this->errors['first_name'] = 'Please provide a valid first name.';
        }
        
        if (!Validator::string($this->data['last_name'], 1, 50, ctype_alpha($this->data['last_name']))) {
            $this->errors['last_name'] = 'Please provide a valid last name.';
        }
        
        if (!Validator::string($this->data['user_name'], 1, 50, ctype_alnum($this->data['user_name']))) {
            $this->errors['user_name'] = 'Please provide a valid user name.';
        }
        
        if (!Validator::phoneNumber($this->data['phone_number'])) {
            $this->errors['phone_number'] = 'Please provide a valid phone number.';
        }
        
        if (!Validator::string($this->data['address'], 1, 255)) {
            $this->errors['address'] = 'Please provide a valid address.';
        }
        
        if (!isset($this->data['image']) || !is_array($this->data['image']) || $this->data['image']['error'] !== UPLOAD_ERR_OK) {
            $this->errors['image'] = 'Error uploading the image.';
        } elseif (!in_array($this->data['image']['type'], ['image/jpeg', 'image/png', 'image/gif'])) {
            $this->errors['image'] = 'Please upload a valid image (JPEG, PNG, GIF).';
        }

        return empty($this->errors);
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function register()
    {
        if ($this->validate()) {
            $user = $this->db->query('SELECT * FROM users WHERE email = :email', [
                'email' => $this->data['email'],
            ])->find();
        
            if ($user) {
                $this->errors['email'] = 'Email already exists!';
                return false;
            }
            
            $imageExtension = pathinfo($this->data['image']['name'], PATHINFO_EXTENSION);
            $imageName = uniqid('user_', true) . '.' . $imageExtension;
            $imagePath = 'assets/images/users/' . $imageName;
        
            move_uploaded_file($this->data['image']['tmp_name'], $imagePath);
            
            try {
                $this->db->query('INSERT INTO users (email, password, first_name, last_name, user_name, phone_number, address, image) VALUES (:email, :password, :first_name, :last_name, :user_name, :phone_number, :address, :image)', [
                    'email' => $this->data['email'],
                    'password' => password_hash($this->data['password'], PASSWORD_DEFAULT),
                    'first_name' => $this->data['first_name'],
                    'last_name' => $this->data['last_name'],
                    'user_name' => $this->data['user_name'],
                    'phone_number' => $this->data['phone_number'],
                    'address' => $this->data['address'],
                    'image' => $imagePath,
                ]);
                return true;
            } catch (Exception $e) {
                $this->errors['registration'] = 'Error during registration: ' . $e->getMessage();
                return false;
            }
        }

        return false;
    }
}
