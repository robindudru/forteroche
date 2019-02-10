<?php

require_once('Common.php');

class Frontend extends Common {

	public function frontPage() {
		$articles = $this->articleManager->getArticles();
		$articlesArray = $this->articleManager->getValue('array');
		$comments = $this->commentManager->getLastComments();
		$commentsArray = $this->commentManager->getValue('array');
		require_once('./view/frontend/homeView.php');
	}

	public function article() {
		$article = $this->articleManager->getArticle($_GET['id']);
		require_once('./view/frontend/articleView.php');
	}

	public function addComment($author, $comment, $articleId) {
		$affectedLines = $this->commentManager->postComment($author, $comment, $articleId);
		if($affectedLines === false) {
			throw new Exception('Impossible d\'ajouter ce commentaire.');
		}
		else {
			header('Location: index.php?action=post&id=' . $articleId);
		}
	}
}