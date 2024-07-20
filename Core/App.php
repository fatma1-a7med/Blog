<?php

namespace Core;
class App{

    protected static $container;

    public static function setContainer($container){
      App::$container=$container;
    }

    public static function getContainer(){
       return App::$container;
    }
    public static function bind($key,$resolver){

        App::getContainer()->bind($key,$resolver);
        
    }
    public static function resolve($key) {
        return App::getContainer()->resolve($key);
    }
}