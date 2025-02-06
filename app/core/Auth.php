<?php

class Auth{
    public static function login($email , $password){
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if($user && password_verify($password , $user['password'])){
            $_SESSION['user'] = $user ;
            return true ;
        }
        
    }

    public static function logout(){
        session_destroy();
    } 

    public static function isloggedIn(){
        return isset($_SESSION['user']);
    }
}