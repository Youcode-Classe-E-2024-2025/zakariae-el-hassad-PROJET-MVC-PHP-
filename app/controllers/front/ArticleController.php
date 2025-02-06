<?php 



use App\Core\Controller; 
use App\Core\View; // Assurez-vous que View est bien dans App\Core

class ArticleController extends Controller{
    public function show($id){
        $articleModel = new Article();
        $article = $articleModel->getArticleById($id);

        if(!$article){
            echo "Article introuvable.";
            return;
        }

        View::render('front/article.twig',['article' => $article]);
    }
}