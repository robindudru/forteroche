<?php

namespace Controller;

class Frontend extends Common {

	public function frontPage() {
		$articles = $this->articleManager->getArticles('published');
		$comments = $this->commentManager->getLastComments();
		$this->commentManager->getArticleTitle($comments);
		require_once('./view/frontend/homeView.php');
	}

	public function article() {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->commentManager->add();
			$this->successManager->setMessage('commentAdded');
			$message = $this->successManager->getMessage();
			require_once('./view/frontend/successView.php');
		}
		else if (isset($_GET['signal'])) {
			$this->commentManager->signalComment($_GET['signal']);
			$this->successManager->setMessage('commentSignaled');
			$message = $this->successManager->getMessage();
			require_once('./view/frontend/successView.php');
		}
		else {
			$article = $this->articleManager->getArticle($_GET['id']);
			$nextId = $this->articleManager->getNextArticle($_GET['id']);
			$prevId = $this->articleManager->getPrevArticle($_GET['id']);
			$comments = $this->commentManager->getComments($_GET['id']);
			require_once('./view/frontend/articleView.php');
		}
	}
}