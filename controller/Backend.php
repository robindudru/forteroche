<?php

namespace Controller;

class Backend extends Common {

	public function login() {
		if  ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
			$this->successManager->success('articleAdded');
		}
		else {
			require_once('./view/backend/addArticleView.php');
		}
	}

	public function editArticle(){
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->articleManager->edit();
			$this->successManager->success('articleEdited');
		}
		else {
			$article = $this->articleManager->getArticle($_GET['id']);
			require_once('./view/backend/editArticleView.php');
		}
	}

	public function trashArticle(){
		$this->articleManager->trash();
		$this->successManager->success('articleTrashed');
	}

	public function deleteArticle(){
		$this->articleManager->delete();
		$this->successManager->success('articleDeleted');
	}

	public function approveComment() {
		$this->commentManager->approve($_GET['id']);
		$this->successManager->success('commentApproved');
	}

	public function deleteComment() {
		$this->commentManager->delete($_GET['id']);
		$this->successManager->success('commentDeleted');
	}

	public function confirm() {
		$this->confirmManager->confirm($_GET['confirm'], $_GET['id']);
	}

	public function editProfile() {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->userManager->editProfile();
			$this->successManager->success('profileEdited');
		}
		else {
			$user = $this->userManager->getProfile();
			require_once('./view/backend/editProfileView.php');
		}
	}

}