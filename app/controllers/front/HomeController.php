<?php 



namespace App\Controllers\Front;

use App\Core\Controller;
use App\Core\View;
use App\Models\Article;
class HomeController extends Controller {
    public function index() {
        $articleModel = new Article();
        $articles = $articleModel->getAllArticles();
    
        if (!$articles) {
            echo "Aucun article trouvé.";
            return;
        }
        $isAdmin = isset($_SESSION['user_status']) && $_SESSION['user_status'] == 1;
            View::render('front/home.twig', [
            'articles' => $articles,
            'isAdmin' => $isAdmin
        ]);
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