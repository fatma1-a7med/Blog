<?php 

ob_start();

use Http\Forms\RegisterForm;

$formData = array_merge($_POST, ['image' => $_FILES['image']]);
$form = new RegisterForm($formData);

if ($form->register()) {
    view('Registration/create.view.php', [
        'errors' => [],
        'registration_success' => true,
        'message' => 'Registration successful!',
    ]);
} else {
    view('Registration/create.view.php', [
        'errors' => $form->getErrors(),
        'registration_success' => false,
    ]);
}

ob_end_flush();
