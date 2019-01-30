<?php $title = $article['title']; ?>

<?php ob_start(); ?>

<h1>
    <?= htmlspecialchars($article['title']) ?>
</h1>

<p>
	<?= $article['content'] ?>
</p>

<a href='index.php'>Retour</a>

<?php $content = ob_get_clean(); ?>

<?php require_once('template.php'); ?>