<?php 

namespace App\Controllers\back;

use App\Core\Controller;
use App\Core\View;
use App\Models\User;

class UserController extends Controller {
    public function index() {
        $userModel = new User();
        $users = $userModel->getAllUsers();

        View::render('back/users.twig', ['users' => $users]);
    }

    public function create(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $password = $_POST['password'];
            if(empty($name) || empty($email) || empty($password)){
                echo "Tous les champs sont obligatoires.";
                return;
            }
    
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "Email invalide.";
                return;
            }
    
            $userModel = new User();
    
            if ($userModel->emailExists($email)) {
                echo "Cet email est déjà utilisé.";
                return;
            }
    
            if($userModel->createUser($name, $email, $password)){
                header("Location: /zakariae-el-hassad-PROJET-MVC-PHP-/public/login");
                exit();
            } else {
                echo "Erreur lors de la création de l'utilisateur.";
            }
        }
    
        View::render('back/signup.twig');
    }

   public function login() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = trim($_POST['email']);
        $password = $_POST['password'];

        if (empty($email) || empty($password)) {
            echo "Email et mot de passe sont obligatoires.";
            return;
        }

        $userModel = new User();
        $user = $userModel->getUserByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
           
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_status'] = $user['status'];
            if ($user['status'] == 1) {
                header("Location: /zakariae-el-hassad-PROJET-MVC-PHP-/public/admin");
            } else {
                header("Location: /zakariae-el-hassad-PROJET-MVC-PHP-/public/home");
            }
            exit();
        } else {
            echo "Email ou mot de passe incorrect.";
        }
    }
    View::render('front/login.twig');
}

    
    

    public function delete($id){
        $userModel = new User();
        $userModel->deleteUser($id);
        header("Location: /zakariae-el-hassad-PROJET-MVC-PHP-/public/login");
    }

    public function deleteUser() {
        $id = $_POST['id'] ?? null;
    
        if (!$id) {
            echo "ID non valide.";
            return;
        }
    
        $articleModel = new User();
        $articleModel->deleteUser($id);
    
        header("Location: /zakariae-el-hassad-PROJET-MVC-PHP-/public/admin");
        exit();
    }

    public function logout() {
        session_start();
        session_unset(); 
        session_destroy(); 
    
        header("Location: /zakariae-el-hassad-PROJET-MVC-PHP-/public/");
        exit();
    }

    
}