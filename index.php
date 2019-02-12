<?php

require_once('controller/Frontend.php');
require_once('controller/Backend.php');

$frontController = new Frontend();
$backController = new Backend();

try {
	if (isset($_GET['mode'])) {
		if ($_GET['mode'] == 'admin') {
			session_start();
			if (isset($_SESSION['username'])) {
				if ($_SESSION['role'] == 'admin') {
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
						else if ($_GET['action'] == 'login') {
							$backController->login();
						}
						else if ($_GET['action'] == 'disconnect') {
							$backController->disconnect();
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
					throw new Exception('Vous n\'êtes pas administrateur !');
				}
			}
			else {
				$backController->login();
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