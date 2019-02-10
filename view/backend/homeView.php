<?php 
		foreach ($articlesArray as $article){
		?>
			<h2><a href="?mode=admin&action=editArticle&id=<?= $article->getValue('id') ?>"><?= htmlspecialchars($article->getValue('title')) ?></a><a href="?mode=admin&action=deleteArticle&id=<?= $article->getValue('id') ?>">   Supprimer</a>
</h2>		<?php
		}
?>

<a href="?mode=admin&action=addArticle">Ajouter un article</a>
<br />
<a href="?mode=admin">Retour</a>