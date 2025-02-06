<?php 

class Security{
    public static function sanitize($data){
        return htmlspecialchars($data , ENT_QUOTES, 'UTF-8');
    }

    public static function generateCSRFToken(){
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    public static function validateCSRFToken($token){
        return isset($_SESSION['csrf_token']) && $_SESSION['csrf_token'] === $token ;
    }
}