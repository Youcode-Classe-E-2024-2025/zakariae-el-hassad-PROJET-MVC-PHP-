<?php 

namespace App\Controllers\front;

use App\Core\Controller; 
use App\Core\View;
use App\Models\Article; 

// class ArticleController extends Controller {
//     public function show($id) {
//         $articleModel = new Article();
//         $article = $articleModel->getArticleById($id);

//         if (!$article) {
//             echo "Article introuvable.";
//             return;
//         }

//         View::render('front/article.twig', ['article' => $article]); // Vérifie que la vue existe
//     }

    class ArticleController extends Controller {
        public function show() {
            if (!isset($_SESSION['user_id'])) {
                echo "Veuillez vous connecter d'abord.";
                return;
            }
    
            $userId = $_SESSION['user_id'];
    
            $articleModel = new Article();
            $articles = $articleModel->getArticleById($userId);
    
        
    
            View::render('front/Article.twig', ['articles' => $articles]);
        }
    }
