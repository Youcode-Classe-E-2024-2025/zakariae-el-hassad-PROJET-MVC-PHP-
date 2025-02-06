<?php 

class Database{
    private static $pdo = null ;

    public static function getConnection(){
        if(self::$pdo === null){
            try {
                $dsn = "pgsql:host=localhost;dbname=nom_bdd";
                self::$pdo = new PDO($dsn, 'utilisateur', 'mot_de_passe', [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]);
            } catch(PDOException $e){
                die ($e->getMessage());
            }
        }
        return self::$pdo;
    }

}