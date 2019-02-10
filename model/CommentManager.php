<?php

require_once('Manager.php');
require_once('Comment.php');

class CommentManager extends Manager {
	private $lastCommentsArray;

	public function getLastComments() {
		$this->lastCommentsArray = [];
		$db = $this->dbConnect();
		$req = $db->query('SELECT * FROM comments ORDER BY id DESC LIMIT 4');
		while ($data = $req->fetch()){
			$comment = new Comment($data['id'], $data['author'], $data['content'], $data['article_id']);
			array_push($this->lastCommentsArray, $comment);
		};
		$req->closeCursor();
	}

	public function getValue($property) {
		if ($property == 'array') {
			return $this->lastCommentsArray;
		}
	}
}