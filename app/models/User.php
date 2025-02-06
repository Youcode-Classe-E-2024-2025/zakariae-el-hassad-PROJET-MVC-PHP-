<?php


class User extends Model{
    protected $table = "users";

    public function createUser($name , $email , $password){
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO users (name , email , password) VALUES (? , ? , ? )";
        return $this->query($sql,[$name , $email , $hashedPassword]);
    }

    public function getUsers($id){
        $sql = "SELECT * FROM users WHERE id = ?";
        return $this->query($sql, [$id])->fetch();
    }

    public function getUserById($id) {
        $sql = "SELECT * FROM users WHERE id = ?";
        return $this->query($sql, [$id])->fetch();
    }

    public function emailExists($email){
        $sql = "SELECT COUNT(*) From users WHERE email = ?";
        return $this->query($sql, [$email])->fetchColumn() > 0; 
    }

    public function getAllUsers() {
        $sql = "SELECT * FROM users";
        return $this->query($sql)->fetchAll();
    }

    public function deleteUser($id) {
        $sql = "DELETE FROM users WHERE id = ?";
        return $this->query($sql, [$id]);
    }

    public function countUsers() {
        $sql = "SELECT COUNT(*) FROM users";
        return $this->query($sql)->fetchColumn();
    }

}