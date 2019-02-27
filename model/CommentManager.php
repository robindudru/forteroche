<?php
/**
 * Managing actions to perform regarding Comments requested by controllers.
 *
 * @package    Forteroche
 * @author     Robin Dupont-Druaux <contact@robindupontdruaux.fr>
 */

namespace Model;

class CommentManager extends Manager
{
    /**
     * @var  array
     */
    private $lastCommentsArray;

    /**
     * Searches for last 6 comments in db, makes them an instance of Comment and puts them in an array
     * 
     * @return  array
     */
    public function getLastComments()
    {
        $this->lastCommentsArray = [];
        $req = $this->reqExec('SELECT * FROM comments ORDER BY id DESC LIMIT 6');
        while ($data = $req->fetch()){
            $comment = new Comment($data);
            array_push($this->lastCommentsArray, $comment);
        };
        $req->closeCursor();
        return $this->lastCommentsArray;
    }

    /**
     * Searches for comments for a given article, makes thems an instance of Comment and puts them in an array
     * 
     * @param int $articleId the id of the article
     * @return  array
     */
    public function getComments($articleId)
    {
        $this->commentsArray = [];
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM comments WHERE article_id = ? ORDER BY id DESC');
        $req->execute(array($articleId));
        while ($data = $req->fetch()) {
            $comment = new Comment($data);
            array_push($this->commentsArray, $comment);
        }
        $req->closeCursor();
        return $this->commentsArray;
    }

    /**
     * Searches through an array of comment's the corresponding titles and sets the Comment's attribute
     * 
     * @param  array $commentsArray the array of comments to search through
     * @return  void
     */
    public function getArticleTitle($commentsArray)
    {
        $articleManager = new ArticleManager();
        foreach($commentsArray as $comment) {
            $article = $articleManager->getArticle($comment->getArticleId());
            $articleTitle = $article->getTitle();
            $comment->setArticleTitle($articleTitle);
        }
    }

    /**
     * Counts the comments which have a given article id to know how many comments this article has.
     * 
     * @param  int $articleId the article id
     * @return  int
     */
    public function totalComments($articleId)
    {
        $db = $this->dbConnect();
        $req = $db->query("SELECT COUNT(id) FROM comments WHERE article_id = '$articleId'")->fetchColumn(); 
        return $req;
    }

    /**
     * Adds a comment in db for current article from form data
     * 
     * @return  void
     */
    public function add() {
        if (!empty($_POST['username']) && !empty($_POST['content']))
        {
            $values = [
                'author' => (string)$_POST['username'],
                'content' => $_POST['content'],
                'article_id' => (int)$_GET['id'],
            ];
            $req = $this->reqArrayPrepare('INSERT INTO comments (author, content, article_id) VALUES (:author, :content, :article_id)', $values);
            if (!$req) {
                throw new \Exception('Erreur lors de l\'ajout du commentaire.');
            }
        }
        else {
            throw new \Exception('Un ou plusieurs champs sont vides.');
        }
    }

    /**
     * Approves a given signaled comment so it doesn't get signaled again 
     * 
     * @param  int $id the id of the comment
     * @return  void
     */
    public function approve($id)
    {
        $req = $this->reqSinglePrepare('UPDATE comments SET moderated = 1 WHERE id = ?', $id);
        if (!$req) {
            throw new \Exception('Erreur lors de l\'approbation du commentaire');
        }
        $req->closeCursor();
    }

    /**
     * Deletes a given signaled comment from db
     * 
     * @param  int $id the id of the comment
     * @return  void
     */
    public function delete($id)
    {
        $req = $this->reqSinglePrepare('DELETE FROM comments WHERE id = ?', $id);
        if (!$req) {
            throw new \Exception('Erreur lors de la suppresion du commentaire');
        }
        $req->closeCursor();
    }
    /**
     * Increases by 1 the signaled counter of a given comment
     * 
     * @param  int $id the id of the comment
     * @return void
     */
    public function signalComment($id)
    {
        $req = $this->reqSinglePrepare('UPDATE comments SET signaled = signaled + 1 WHERE id = ?', $id);
        if (!$req) {
            throw new \Exception('Erreur lors du signalement du commentaire');
        }
        $req->closeCursor();
    }

    /**
     * Searches for comments signaled at least once which have not been approved, ordered by number of signals
     * Makes them an instance of Comment and puts them in an array.
     * 
     * @return  array 
     */
    public function getSignaled()
    {
        $this->signaledArray = [];
        $req = $this->reqExec('SELECT * FROM comments WHERE signaled > 0 AND moderated = 0 ORDER BY signaled DESC');
        while ($data = $req->fetch()){
            $comment = new Comment($data);
            array_push($this->signaledArray, $comment);
        };
        $req->closeCursor();
        return $this->signaledArray;
    }
}