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
            $article = $articleModel->getArticleById($userId);
    
        
    
            View::render('front/Article.twig', ['article' => $article]);
        }


        public function create() {
            if (!isset($_SESSION['user_id'])) {
                echo "Veuillez vous connecter d'abord.";
                return;
            }
    
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $titre = trim($_POST['title']);
                $content = trim($_POST['content']);
                $authorId = $_SESSION['user_id']; 
                $createdAt = date('Y-m-d H:i:s');
    
                if (empty($titre) || empty($content)) {
                    echo "Le titre et le contenu sont obligatoires.";
                    return;
                }
    
                $articleModel = new Article();
                $articleModel->createArticle($titre, $content, $authorId ,  $createdAt);
    
                header("Location: /zakariae-el-hassad-PROJET-MVC-PHP-/public/userarticles");
                exit();
            }
    
            View::render('front/Article.twig');
        }

        public function deleteArticle() {
            $id = $_POST['id'] ?? null;
        
            if (!$id) {
                echo "ID non valide.";
                return;
            }
        
            $articleModel = new Article();
            $articleModel->deleteArticle($id);
        
            header("Location: /zakariae-el-hassad-PROJET-MVC-PHP-/public/userarticles");
            exit();
        }


        public function deleteAdminArticle() {
            $id = $_POST['id'] ?? null;
        
            if (!$id) {
                echo "ID non valide.";
                return;
            }
        
            $articleModel = new Article();
            $articleModel->deleteArticle($id);
        
            header("Location: /zakariae-el-hassad-PROJET-MVC-PHP-/public/admin");
            exit();
        }
        
        
        
        
        
    }
