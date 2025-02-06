<?php 


use App\Core\Controller; 
use App\Core\View; 

class UserController extends Controller{
    public function index(){
        $userModel = new User();
        $users = $userModel->getAllUsers();

        View::render('back/users.twig' , ['users' => $users]);
    }

    public function create(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $userModel = new User();
            $userModel->createUser($name , $email , $password);

            header("Location:  /admin/users");
        }

        View::render('back/create_user.twig');
    }

    public function delete($id){
        $userModel = new User();
        $userModel->deleteUser($id);
        header("Location: /admin/users");
    }
}