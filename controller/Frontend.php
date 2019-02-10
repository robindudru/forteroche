<?php

require_once('./model/ArticleManager.php');
require_once('./model/CommentManager.php');

function frontPage() {
	$articleManager = new ArticleManager();
	$articles = $articleManager->getArticles();
	$commentManager = new CommentManager();
	$lastComments = $commentManager->getLastComments();
	require_once('./view/frontend/homeView.php');
}

function article() {
	$articleManager = new ArticleManager();
	$article = $articleManager->getArticle($_GET['id']);

	require_once('./view/frontend/articleView.php');
}

function addComment($author, $comment, $articleId) {
	$commentManager = new CommentManager();
	$affectedLines = $commentManager->postComment($author, $comment, $articleId);

	if($affectedLines === false) {
		throw new Exception('Impossible d\'ajouter ce commentaire.');
	}
	else {
		header('Location: index.php?action=post&id=' . $articleId);
	}
}