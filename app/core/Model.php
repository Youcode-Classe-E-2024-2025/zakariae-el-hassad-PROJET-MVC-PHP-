<?php

class Model {
    protected $pdo ;

    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }

    protected function query($sql , $params = []){
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }
}