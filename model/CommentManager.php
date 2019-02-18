<?php

require_once('Manager.php');
require_once('Comment.php');
require_once('ArticleManager.php');

class CommentManager extends Manager {
	private $lastCommentsArray;

	public function getLastComments() {
		$this->lastCommentsArray = [];
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT * FROM comments ORDER BY id DESC LIMIT 4');
		$req->execute();
		while ($data = $req->fetch()){
			$comment = new Comment($data['id'], $data['author'], $data['content'], $data['article_id'], $data['signaled']);
			array_push($this->lastCommentsArray, $comment);
		};
		$req->closeCursor();
		return $this->lastCommentsArray;
	}

	public function getComments($articleId) {
		$this->commentsArray = [];
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT * FROM comments WHERE article_id = ? ORDER BY id DESC');
		$req->execute(array($articleId));
		while ($data = $req->fetch()) {
			$comment = new Comment($data['id'], $data['author'], $data['content'], $data['article_id'], $data['signaled']);
			array_push($this->commentsArray, $comment);
		}
		$req->closeCursor();
		return $this->commentsArray;
	}

	public function getArticleTitle($commentsArray) {
		$articleManager = new ArticleManager();
		foreach($commentsArray as $comment) {
			$article = $articleManager->getArticle($comment->getValue('articleId'));
			$articleTitle = $article->getValue('title');
			$comment->setValue('articleTitle', $articleTitle);
		}
	}

	public function totalComments($articleId) {
		$db = $this->dbConnect();
		$req = $db->query("SELECT COUNT(id) FROM comments WHERE article_id = '$articleId'")->fetchColumn(); 
		return $req;
	}

	public function add() {
		if (!empty($_POST['username']) && !empty($_POST['content'])) {
			$values = [
				'author' => $_POST['username'],
				'content' => $_POST['content'],
				'article_id' => (int)$_GET['id'],
			];
			$db = $this->dbConnect();
			$req = $db->prepare('INSERT INTO comments (author, content, article_id) VALUES (:author, :content, :article_id)');
			if (!$req->execute($values)) {
				throw new Exception('Erreur lors de l\'ajout du commentaire.');
			}
		}
		else {
			throw new Exception('Un ou plusieurs champs sont vides.');
		}
	}

	public function approve($id) {
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE comments SET moderated = 1 WHERE id = ?');
		if (!$req->execute(array($id))) {
			throw new Exception('Erreur lors de l\'approbation du commentaire');
		}
		$req->closeCursor();
	}

	public function delete($id) {
		$db = $this->dbConnect();
		$req = $db->prepare('DELETE FROM comments WHERE id = ?');
		if (!$req->execute(array($id))) {
			throw new Exception('Erreur lors de la suppresion du commentaire');
		}
		$req->closeCursor();
	}

	public function signalComment($id) {
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE comments SET signaled = signaled + 1 WHERE id = ?');
		if (!$req->execute(array($id))) {
			throw new Exception('Erreur lors du signalement du commentaire');
		}
		$req->closeCursor();
	}

	public function getSignaled(){
		$this->signaledArray = [];
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT * FROM comments WHERE signaled > 0 AND moderated = 0 ORDER BY signaled DESC');
		$req->execute();
		while ($data = $req->fetch()){
			$comment = new Comment($data['id'], $data['author'], $data['content'], $data['article_id'], $data['signaled']);
			array_push($this->signaledArray, $comment);
		};
		$req->closeCursor();
		return $this->signaledArray;
	}
}