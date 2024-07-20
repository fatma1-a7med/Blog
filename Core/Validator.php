<?php
   
   namespace Core;

   class Validator{
     
    public static function string($value, $min=1,$max=INF,$condition=true){
        $value= trim($value);
        return strlen($value) >= $min && strlen($value) <= $max && $condition ;
    }
    public static function email($value){
        return filter_var($value,FILTER_VALIDATE_EMAIL);
    }
    public static function phoneNumber($value) {
        return preg_match('/^[0-9]{11}$/', $value);
    }

   }

