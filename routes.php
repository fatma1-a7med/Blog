<?php

    $router->get('/','home.php');
    $router->get('/about','about.php');
    $router->get('/contact','contact.php');

    //Auth
    $router->get('/register','Registration/create.php')->only('guest');
    $router->post('/register','Registration/store.php')->only('guest');
    
    $router->get('/login','Login/create.php')->only('guest');
    $router->post('/login','Login/store.php')->only('guest');
    $router->delete('/logout', 'Login/destroy.php')->only('auth');

    //profile
    $router->get('/profile','profile/index.php')->only('auth');
    $router->get('/profile/edit', 'profile/edit.php')->only('auth');
    $router->patch('/profile', 'profile/update.php')->only('auth');

    // Password
    $router->get('/password/edit', 'password/edit.php')->only('auth');
    $router->patch('/password/update', 'password/update.php')->only('auth');

    //posts
    $router->get('/posts','posts/index.php')->only('auth');
    $router->get('/posts/create','posts/create.php')->only('auth');
    $router->post('/posts/create','posts/store.php')->only('auth');
    $router->get('/post', 'posts/show.php')->only('auth');
    $router->get('/post/edit', 'posts/edit.php')->only('auth');
    $router->patch('/post/update', 'posts/update.php')->only('auth');
    $router->delete('/post/destroy', 'posts/destroy.php')->only('auth');

    //comments  /post
    $router->post('/comments/create', 'comments/create.php')->only('auth');
    $router->delete('/comment/destroy', 'comments/destroy.php')->only('auth');


