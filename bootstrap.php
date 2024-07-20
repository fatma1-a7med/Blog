<?php

require_once __DIR__ . '/Core/Container.php';
require_once __DIR__ . '/Core/App.php';
require_once __DIR__ . '/Core/Database.php';
require_once __DIR__ . '/Core/Authenticator.php';

use Core\App;
use Core\Authenticator;
use Core\Container;
use Core\Database;


$container=new Container();
$container->bind('Core\Database',function(){
    $config = require base_path('config.php');
    return new Database($config['database']);

});

$db = $container->resolve('Core\Database');

App::setContainer($container);
(new Authenticator)->checkRememberMe();
