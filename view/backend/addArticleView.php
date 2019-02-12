<?php
$title = 'Administration | Ajouter un article';
ob_start();
?>
<div class="row no-gutters">
	<div class="col-8">
		<h1 class="admin-section-title mt-5 mx-3">Edition</h1>
		<hr class="mx-3 my-0"/>
		<div class="row no-gutters">
			<form method="post" class="article-form ml-3" action="?mode=admin&action=addArticle">
				<div class="input-group mb-3 mt-3">
					<span class="input-group-text">Titre</span>
					<input type="text" class="form-control" name="title">
				</div>
				<textarea class="ml-3" id="tinymce" name="content"></textarea><br />
				<div class="text-right">
					<button type="submit" class="btn btn-dark">Envoyer</button>
				</div>
			</form>
		</div>
	</div>
	<aside class="col-4 pl-5">
		<h1 class="admin-section-title mt-5 mx-3">Commentaires</h1>
		<hr class="mx-3 my-0"/>
	</aside>
</div>

<?php

$content = ob_get_clean();
require_once('template.php');

