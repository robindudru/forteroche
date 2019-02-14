<?php $title = $article->getValue('title');
$pageTitle = 'TABLE DES MATIERES';

ob_start(); ?>

<h1>
    <?= $article->getValue('title'); ?>
</h1>

<p id="leftContent">
	<?= $article->getValue('content')?>
</p>

<a href='index.php'>Retour</a>

<?php $contentLeft = ob_get_clean();
ob_start(); ?>

<p id="rightContent">
	
</p>

<?php
$contentRight = ob_get_clean();
require_once('template.php');
