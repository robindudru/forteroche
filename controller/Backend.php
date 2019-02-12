<?php

require_once('Common.php');

class Backend extends Common {

	public function login() {
		if  ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$login = $this->userManager->login();
			if ($login) {
				$this->adminHome();
			}
			else {
				require_once('./view/backend/loginView.php');
			}
		}
		else {
			require_once('./view/backend/loginView.php');
		}
	}

	public function disconnect() {
		session_destroy();
		header('Location:index.php?mode=admin&action=login');
	}

	public function adminHome() {
		$articles = $this->articleManager->getArticles();
		$articlesArray = $this->articleManager->getValue('array');
		require_once('./view/backend/homeView.php');
	}

	public function addArticle(){
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->articleManager->add();
			$this->successManager->setMessage('articleAdded');
			$message = $this->successManager->getMessage();
			require_once('./view/backend/successView.php');
		}
		else {
			require_once('./view/backend/addArticleView.php');
		}
	}

	public function editArticle(){
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->articleManager->edit();
			$this->successManager->setMessage('articleEdited');
			$message = $this->successManager->getMessage();
			require_once('./view/backend/successView.php');
		}
		else {
			$article = $this->articleManager->getArticle($_GET['id']);
			require_once('./view/backend/editArticleView.php');
		}
	}

	public function deleteArticle(){
		$this->articleManager->delete();
		$this->successManager->setMessage('articleDeleted');
		$message = $this->successManager->getMessage();
		require_once('./view/backend/successView.php');
	}

}