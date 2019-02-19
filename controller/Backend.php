<?php

namespace Controller;

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
		$publishedArticles = $this->articleManager->getArticles('published');
		$draftArticles = $this->articleManager->getArticles('draft');
		$trashArticles = $this->articleManager->getArticles('trash');
		$signaled = $this->commentManager->getSignaled();
		$this->commentManager->getArticleTitle($signaled);
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

	public function trashArticle(){
		$this->articleManager->trash();
		$this->successManager->setMessage('articleTrashed');
		$message = $this->successManager->getMessage();
		require_once('./view/backend/successView.php');
	}

	public function deleteArticle(){
		$this->articleManager->delete();
		$this->successManager->setMessage('articleDeleted');
		$message = $this->successManager->getMessage();
		require_once('./view/backend/successView.php');
	}

	public function approveComment() {
		$this->commentManager->approve($_GET['id']);
		$this->successManager->setMessage('commentApproved');
		$message = $this->successManager->getMessage();
		require_once('./view/backend/successView.php');
	}

	public function deleteComment() {
		$this->commentManager->delete($_GET['id']);
		$this->successManager->setMessage('commentDeleted');
		$message = $this->successManager->getMessage();
		require_once('./view/backend/successView.php');
	}

	public function confirm() {
		$this->confirmManager->setValues($_GET['confirm']);
		$message = $this->confirmManager->getMessage();
		$url = $this->confirmManager->getUrl();
		require_once('./view/backend/confirmView.php');
	}

	public function editProfile() {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->userManager->editProfile();
			$this->successManager->setMessage('profileEdited');
			$message = $this->successManager->getMessage();
			require_once('./view/backend/successView.php');
		}
		else {
			$user = $this->userManager->getProfile();
			require_once('./view/backend/editProfileView.php');
		}
	}

}