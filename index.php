<?php

require_once('controller/Frontend.php');
require_once('controller/Backend.php');


try {
	if (isset($_GET['mode'])) {
		if ($_GET['mode'] == 'admin') {

		}
		else {
			throw new Exception('Ce mode est inexistant.');
		}
	}

	else if (isset($_GET['action'])) {
		if ($_GET['action'] == 'home') {
			frontPage();
		}
		else if ($_GET['action'] == 'article') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				article();
			}
			else {
				throw new Exception ('L\'identifiant ne peut pas être négatif.');
			}
		}
	}

	else {
		frontPage();
	}
}

catch(Exception $e) {
	$errorMessage =  $e->getMessage();
	require_once('view/frontend/errorView.php');
}