<?php 



namespace App\Controllers\Front;

use App\Core\Controller;
use App\Core\View;
use App\Models\Article;
class HomeController extends Controller {
    public function index() {
        $articleModel = new Article();
        $article = $articleModel->getAllArticles();

        if(!$article){
            echo "Article introuvable.";
            return;
        }
        View::render('front/home.twig',['article' => $article]);
    }

    public function showlogin() {
        View::render('front/login.twig', ['message' => 'Bienvenue sur la page d\'accueil!']);
    }

    public function showsinup() {
        View::render('front/signup.twig', ['message' => 'Bienvenue sur la page d\'accueil!']);
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