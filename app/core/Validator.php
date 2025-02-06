<?php 

class Validator{
    public static function email($email){
        return filter_var($email , FILTER_VALIDATE_EMAIL);
    }

    public static function length($value , $min , $max){
        return strlen($value) >= $ $min && strlen($value) <= $max;
    } 
}