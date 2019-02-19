<?php
$title = 'Edition | '. $article->getTitle();
ob_start();
?>
<div class="row no-gutters">
	<div class="col-8">
		<h1 class="admin-section-title mt-5 mx-3">Editer un article</h1>
		<hr class="mx-3 my-0"/>
		<div class="row no-gutters">
			<form method="post" class="article-form ml-3" action="?mode=admin&action=editArticle&id=<?= $_GET['id'] ?>">
				<div class="input-group mb-3 mt-3">
					<span class="input-group-text">Titre</span>
					<input type="text" class="form-control" name="title" value="<?= $article->getTitle() ?>" required>
				</div>
				<textarea class="ml-3" id="tinymce" name="content" required><?= $article->getContent() ?></textarea><br />
				<div class="text-right">
					<button type="submit" class="btn btn-dark">Editer</button>
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