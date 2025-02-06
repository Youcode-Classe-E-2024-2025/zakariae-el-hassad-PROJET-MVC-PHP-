<?php 

use App\Core\Controller;

class DashboardController extends Controller{
    public function index(){
        $userModel = new User();
        $articleModel = new Article();

        $stats = [
            'totalUsers' => $userModel->countUsers(),
            'totalArticles' => $articleModel->countArticles()
        ];
    }
}