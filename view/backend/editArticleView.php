<form method="post" action="?mode=admin&action=editArticle&id=<?= $_GET['id'] ?>">
	<input type="text" name="title" value="<?= $article->getValue('title') ?>"><br />
	<textarea name="content"><?= $article->getValue('content') ?></textarea><br />
	<input type="submit" value="Envoyer">
</form>
<br />
<a href="?mode=admin">Retour</a>