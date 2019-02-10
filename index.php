<?php

require_once('controller/Frontend.php');
require_once('controller/Backend.php');

$frontController = new Frontend();
$backController = new Backend();

try {
	if (isset($_GET['mode'])) {
		if ($_GET['mode'] == 'admin') {
			if (isset($_GET['action'])) {
				if ($_GET['action'] == 'addArticle') {
					$backController->addArticle();
				}
				else if ($_GET['action'] == 'editArticle') {
					$backController->editArticle();
				}
				else if ($_GET['action'] == 'deleteArticle') {
					$backController->deleteArticle();
				}
				else {
					throw new Exception('Action inconnue');
				}
			}
			else {
				$backController->adminHome();	
			}
		}
		else {
			throw new Exception('Mode inconnu');
		}
	}

	else if (isset($_GET['action'])) {
		if ($_GET['action'] == 'home') {
			$frontController->frontPage();
		}
		else if ($_GET['action'] == 'article') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				$frontController->article();
			}
			else {
				throw new Exception ('L\'identifiant ne peut pas être négatif.');
			}
		}
	}
	else {
		$frontController->frontPage();
	}
}

catch(Exception $e) {
	$errorMessage =  $e->getMessage();
	require_once('view/frontend/errorView.php');
}