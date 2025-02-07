<?php 

namespace App\Models;

use App\Core\Model;

class Article extends Model{
    protected $table = "articles";

    public function createArticle($titre, $content,$authorId , $createdAt){
        $sql = "INSERT INTO articles (title, content , user_id , created_at) Values (? , ? , ? , ?)";
        return $this->query($sql, [$titre, $content , $authorId , $createdAt]);
    }

    public function getAllArticles(){
        $sql = "SELECT * FROM articles ORDER BY created_at DESC";
        return $this->query($sql)->fetchAll();
    }

    public function getArticleById($userId) {
        $sql = "SELECT * FROM articles WHERE user_id = ?";
        return $this->query($sql, [$userId])->fetchAll();
    }

    public function updateArticle($id, $title, $content) {
        $sql = "UPDATE articles SET title = ?, content = ? WHERE id = ?";
        return $this->query($sql, [$title, $content, $id]);
    }

    public function deleteArticle($id) {
        $sql = "DELETE FROM articles WHERE id = ?";
        return $this->query($sql, [$id]);
    }    

    public function countArticles() {
        $sql = "SELECT COUNT(*) FROM articles";
        return $this->query($sql)->fetchColumn();
    }
}