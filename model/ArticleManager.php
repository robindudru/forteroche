<?php
namespace Model;

class ArticleManager extends Manager
{
    private $articlesArray;

    public function getArticles($status)
    {
        $this->articlesArray = [];
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM articles WHERE status = ? ORDER BY id');
        $req->execute(array($status));
        while ($data = $req->fetch()){
            $article = new Article($data);
            array_push($this->articlesArray, $article);
        };
        $req->closeCursor();
        return $this->articlesArray;
    }

    public function getArticle($articleId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM articles WHERE id = ?');
        $req->execute(array($articleId));
        $data = $req->fetch();
        if (!empty($data)) {
            $article = new Article($data);
            return $article;
        }
        else {
            throw new \Exception ('Cet article n\'existe pas.');
        }
    }

    public function getNextArticle($articleId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare("SELECT id, title FROM articles WHERE id = (SELECT min(id) from articles WHERE id > ?) AND status = 'published'");
        $req->execute(array($articleId));
        $data = $req->fetch();
        if (!empty($data)) {
            $data = array("id" => $data['id'], "title" => StringManager::slug($data['title']));
            return $data;
        }
        else {
            return 'last';
        }
    }

    public function getPrevArticle($articleId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare("SELECT id, title FROM articles WHERE id = (SELECT max(id) from articles WHERE id < ?) AND status = 'published'");
        $req->execute(array($articleId));
        $data = $req->fetch();
        if (!empty($data)) {
            $data = array("id" => $data['id'], "title" => StringManager::slug($data['title']));
            return $data;
        }
        else {
            return 'first';
        }
    }	

    public function add()
    {
        if (!empty($_POST['title']) && !empty($_POST['content'])) {
            $values = [
                'title' => StringManager::noAccents(trim((string)$_POST['title'])),
                'content' => $_POST['content'],
                'status' => $_POST['status']
            ];
            $db = $this->dbConnect();
            $req = $db->prepare('INSERT INTO articles (title, content, status) VALUES (:title, :content, :status)');
            if (!$req->execute($values)) {
                throw new \Exception('Erreur lors de l\'ajout de l\'article');
            }
        }
        else {
            throw new \Exception('Un ou plusieurs champs sont vides.');
        }
    }

    public function edit()
    {
        $values = [
            'title' => StringManager::noAccents(trim((string)$_POST['title'])),
            'content' => $_POST['content'],
            'status' => $_POST['status'],
            'now' => date("Y-m-d H:i:s"),
            'id' => (int)$_GET['id']
        ];
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE articles SET title=:title, content=:content, updated=:now, status=:status WHERE id=:id');
        if (!$req->execute($values)) {
            throw new \Exception ('Erreur lors de l\'édition de l\'article');
        }
    }

    public function trash()
    {
        $articleId = (int)$_GET['id'];
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE articles SET status = "trash" WHERE id= ?');
        if (!$req->execute(array($articleId))) {
            throw new \Exception ('Erreur lors de la mise en corbeille de l\'article');
        }
    }

    public function delete()
    {
        $articleId = (int)$_GET['id'];
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM articles WHERE id = ?');
        $req2 = $db->prepare('DELETE FROM comments WHERE article_id = ?');
        if (!$req->execute(array($articleId)) || !$req2->execute(array($articleId))) {
		    throw new \Exception('Erreur lors de la suppression de l\'article');
        }
    }
}