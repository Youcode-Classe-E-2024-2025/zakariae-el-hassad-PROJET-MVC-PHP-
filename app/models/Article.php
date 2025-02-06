<?php 


class Article extends Model{
    protected $table = "articles";

    public function createArticle($titre, $content,$authorId){
        $sql = "INSERT INTO articles (titre, content , author_id , created_at) Values (? , ? , ? ,NOM())";
        return $this->query($sql, [$titre, $content , $authorId]);
    }

    public function getAllArticles(){
        $sql = "SELECT * FROM articles ORDER BY created_at DESC";
        return $this->query($sql)->fetchAll();
    }

    public function getArticleById($id){
        $sql = "SELECT * FROM articles WHERE id = ?";
        return $this->query($sql,[$id])->fetch();
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