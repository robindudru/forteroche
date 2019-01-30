<?php

require_once('Manager.php');

class ArticleManager extends Manager {
	public function getArticles() {
		$db = $this->dbConnect();
		$req = $db->query('SELECT id, title FROM articles');
		return $req;
	}

	public function getArticle($articleId) {
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT * FROM articles WHERE id = ?');
		$req->execute(array($articleId));
		$article = $req->fetch();
		if (!empty($article)) {
			return $article;
		}
		else {
			throw new Exception ('Cet article n\'existe pas.');
		}
	}
}