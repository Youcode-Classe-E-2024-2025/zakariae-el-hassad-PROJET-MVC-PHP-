<?php 
namespace App\Controllers\back;

use App\Core\Controller;
use App\Models\User;
use App\Core\View;
use App\Models\Article;


class DashboardController extends Controller{
    public function index(){
        $userModel = new User();
        $articleModel = new Article();
        
        // Récupérer les articles et utilisateurs
        $articles = $articleModel->getAllArticles();
        $users = $userModel->getAllUsers();
        
        // Passer les deux variables à la vue dans un seul tableau
        View::render('back/dashboard.twig', [
            'articles' => $articles,
            'users' => $users
        ]);
    }
}