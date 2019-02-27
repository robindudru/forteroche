<?php
namespace Model;

class CommentManager extends Manager
{
	private $lastCommentsArray;

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

	public function getArticleTitle($commentsArray)
	{
		$articleManager = new ArticleManager();
		foreach($commentsArray as $comment) {
			$article = $articleManager->getArticle($comment->getArticleId());
			$articleTitle = $article->getTitle();
			$comment->setArticleTitle($articleTitle);
		}
	}

	public function totalComments($articleId)
	{
		$db = $this->dbConnect();
		$req = $db->query("SELECT COUNT(id) FROM comments WHERE article_id = '$articleId'")->fetchColumn(); 
		return $req;
	}

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

	public function approve($id)
	{
		$req = $this->reqSinglePrepare('UPDATE comments SET moderated = 1 WHERE id = ?', $id);
		if (!$req) {
			throw new \Exception('Erreur lors de l\'approbation du commentaire');
		}
		$req->closeCursor();
	}

	public function delete($id)
	{
		$req = $this->reqSinglePrepare('DELETE FROM comments WHERE id = ?', $id);
		if (!$req) {
			throw new \Exception('Erreur lors de la suppresion du commentaire');
		}
		$req->closeCursor();
	}

	public function signalComment($id)
	{
		$req = $this->reqSinglePrepare('UPDATE comments SET signaled = signaled + 1 WHERE id = ?', $id);
		if (!$req) {
			throw new \Exception('Erreur lors du signalement du commentaire');
		}
		$req->closeCursor();
	}

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