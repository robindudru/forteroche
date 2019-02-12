<?php

require_once('Manager.php');
require_once('Article.php');

class ArticleManager extends Manager {
	private $articlesArray;

	public function getArticles() {
		$this->articlesArray = [];
		$db = $this->dbConnect();
		$req = $db->query('SELECT * FROM articles ORDER BY id');
		while ($data = $req->fetch()){
			$article = new Article($data['id'], $data['title'], $data['content'], $data['date']);
			array_push($this->articlesArray, $article);
		};
		$req->closeCursor();
	}

	public function getValue($property) {
		if ($property == 'array') {
			return $this->articlesArray;
		}
	}

	public function getArticle($articleId) {
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT * FROM articles WHERE id = ?');
		$req->execute(array($articleId));
		$data = $req->fetch();
		if (!empty($data)) {
			$article = new Article($data['id'], $data['title'], $data['content'], $data['date']);
			return $article;
		}
		else {
			throw new Exception ('Cet article n\'existe pas.');
		}
	}

	public function add() {
		if (!empty($_POST['title']) && !empty($_POST['content'])) {
			$values = [
				'title' => $_POST['title'],
				'content' => $_POST['content']
			];
			$db = $this->dbConnect();
			$req = $db->prepare('INSERT INTO articles (title, content) VALUES (:title, :content)');
			if (!$req->execute($values)) {
				throw new Exception('Erreur lors de l\'ajout de l\'article');
			}
		}
		else {
			throw new Exception('Un ou plusieurs champs sont vides.');
		}
	}

	public function edit() {
		$values = [
			'title' => $_POST['title'],
			'content' => $_POST['content'],
			'now' => date("Y-m-d H:i:s"),
			'id' => intval($_GET['id'])
		];
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE articles SET title=:title, content=:content, updated=:now WHERE id=:id');
		if (!$req->execute($values)) {
			throw new Exception ('Erreur lors de l\'édition de l\'article');
		}
	}

	public function delete() {
		$articleId = intval($_GET['id']);
		$db = $this->dbConnect();
		$req = $db->prepare('DELETE FROM articles WHERE id = ?');
		if (!$req->execute(array($articleId))) {
			throw new Exception('Erreur lors de la suppression de l\'article');
		}
	}
}