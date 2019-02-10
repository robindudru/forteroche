<?php

require_once('Manager.php');

class CommentManager extends Manager {
	public function getLastComments() {
		$db = $this->dbConnect();
		$req = $db->query('SELECT * FROM comments ORDER BY id DESC LIMIT 4');
		return $req;
	}

	public function getArticleTitle($articleId) {
		$db = $this->dbConnect();
		$req = $db->prepare("SELECT title FROM articles WHERE id= ?");
		$req->execute(array($articleId));
		return $req;
	}
}