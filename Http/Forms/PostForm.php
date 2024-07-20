<?php

namespace Http\Forms;

use Core\Validator;

class PostForm {
    protected $errors = [];

    public function validate($title, $content, $image) {
        if (!Validator::string($title, 1, 255)) {
            $this->errors['title'] = 'Please provide a valid title (1-255 characters).';
        }

        if (!Validator::string($content, 1, 255)) {
            $this->errors['content'] = 'Please provide valid content.';
        }

        if ($image['error'] !== UPLOAD_ERR_OK) {
            $this->errors['image'] = 'Please upload a valid image.';
        } elseif (!in_array($image['type'], ['image/jpeg', 'image/png', 'image/gif'])) {
            $this->errors['image'] = 'Only JPG, PNG, and GIF files are allowed.';
        }

        return empty($this->errors);
    }

    public function errors() {
        return $this->errors;
    }

    public function error($field, $message) {
        $this->errors[$field] = $message;
    }
}
