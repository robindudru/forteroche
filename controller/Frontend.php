<?php

require_once('Common.php');

class Frontend extends Common {

	public function frontPage() {
		$articles = $this->articleManager->getArticles();
		$articlesArray = $this->articleManager->getValue('array');
		$comments = $this->commentManager->getLastComments();
		$commentsArray = $this->commentManager->getValue('array');
		$this->commentManager->getArticleTitle($commentsArray);
		require_once('./view/frontend/homeView.php');
	}

	public function article() {
		$article = $this->articleManager->getArticle($_GET['id']);
		require_once('./view/frontend/articleView.php');
	}
}