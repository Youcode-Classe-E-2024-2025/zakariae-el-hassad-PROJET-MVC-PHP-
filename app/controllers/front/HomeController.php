<?php 




namespace App\Controllers\Front;

use App\Core\Controller;
use App\Core\View; 
class HomeController extends Controller {
    public function index() {
        View::render('front/login.twig', ['message' => 'Bienvenue sur la page d\'accueil!']);
    }
}




// use App\Core\Controller;

// class HomeController extends Controller{
//     public function index(){
//         $articleModel = new Article();
//         $articles = $articleModel->getAllArticles();

//         view::render('front/home.twig' , ['articles' => $articles]);
//     }


// }