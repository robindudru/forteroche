<?php
/**
 * Managing actions to perform regarding Articles requested by controllers.
 *
 * @package    Forteroche
 * @author     Robin Dupont-Druaux <contact@robindupontdruaux.fr>
 */

namespace Model;

class ArticleManager extends Manager
{
    /**
     *  @var array
     */
    private $articlesArray;

    /**
     * Searches for articles with given status, makes them an Article instance and puts them in an array.
     *
     * @param  string $status the article status : published, draft or trash
     * @return  array filled with gathered Articles
     */
    public function getArticles($status)
    {
        $this->articlesArray = [];
        $req = $this->reqSinglePrepare('SELECT * FROM articles WHERE status = ? ORDER BY id', $status);
        while ($data = $req->fetch()) {
            $article = new Article($data);
            array_push($this->articlesArray, $article);
        };
        $req->closeCursor();
        return $this->articlesArray;
    }
    /**
     * Searches for a given article, makes an Article instance out of it.
     *
     * @param  int $articleId the id of wanted Article
     * @return  object
     */
    public function getArticle($articleId)
    {
        $req = $this->reqSinglePrepare('SELECT * FROM articles WHERE id = ?', $articleId);
        $data = $req->fetch();
        if (!empty($data)) {
            $article = new Article($data);
            return $article;
        } else {
            throw new \Exception('Cet article n\'existe pas.');
        }
    }
    /**
     * Searches for next id after current article's id
     *
     * @param  int $articleId id of current article
     * @return  int next article id
     */
    public function getNextArticle($articleId)
    {
        $req = $this->reqSinglePrepare("SELECT id, title FROM articles WHERE id = (SELECT min(id) from articles WHERE id > ?) AND status = 'published'", $articleId);
        $data = $req->fetch();
        if (!empty($data)) {
            $data = array("id" => $data['id'], "title" => StringManager::slug($data['title']));
            return $data;
        } else {
            return 'last';
        }
    }
    /**
     * Searches for previous id before current article's id
     *
     * @param  int $articleId id of current article
     * @return  int previous article id
     */
    public function getPrevArticle($articleId)
    {
        $req = $this->reqSinglePrepare("SELECT id, title FROM articles WHERE id = (SELECT max(id) from articles WHERE id < ?) AND status = 'published'", $articleId);
        $data = $req->fetch();
        if (!empty($data)) {
            $data = array("id" => $data['id'], "title" => StringManager::slug($data['title']));
            return $data;
        } else {
            return 'first';
        }
    }
    /**
     * Creates new article in db from form data.
     *
     * @return  void
     */
    public function add()
    {
        if (!empty($_POST['title']) && !empty($_POST['content'])) {
            $values = [
                'title' => StringManager::noAccents(trim((string) $_POST['title'])),
                'content' => $_POST['content'],
                'status' => $_POST['status'],
                'now' => date("Y-m-d H:i:s")
            ];
            $req = $this->reqArrayPrepare('INSERT INTO articles (title, content, status, date, updated) VALUES (:title, :content, :status, :now, :now)', $values);
            if (!$req) {
                throw new \Exception('Erreur lors de l\'ajout de l\'article');
            }
        } else {
            throw new \Exception('Un ou plusieurs champs sont vides.');
        }
    }
    /**
     * Edits database article entry from form data
     *
     * @return  void
     */
    public function edit()
    {
        $values = [
            'title' => StringManager::noAccents(trim((string) $_POST['title'])),
            'content' => $_POST['content'],
            'status' => $_POST['status'],
            'now' => date("Y-m-d H:i:s"),
            'id' => (int) $_GET['id'],
        ];
        $req = $this->reqArrayPrepare('UPDATE articles SET title=:title, content=:content, updated=:now, status=:status WHERE id=:id', $values);
        if (!$req) {
            throw new \Exception('Erreur lors de l\'édition de l\'article');
        }
    }
    /**
     * Edits article status in db to trash
     *
     * @return  void
     */
    public function trash()
    {
        $req = $this->reqSinglePrepare('UPDATE articles SET status = "trash" WHERE id= ?', (int) $_GET['id']);
        if (!$req) {
            throw new \Exception('Erreur lors de la mise en corbeille de l\'article');
        }
    }
    /**
     * Deletes article and corresponding comments from db
     *
     * @return  void
     */
    public function delete()
    {
        $req = $this->reqSinglePrepare('DELETE FROM articles WHERE id = ?', (int) $_GET['id']);
        $req2 = $this->reqSinglePrepare('DELETE FROM comments WHERE article_id = ?', (int) $_GET['id']);
        if (!$req || !$req2) {
            throw new \Exception('Erreur lors de la suppression de l\'article');
        }
    }
}
