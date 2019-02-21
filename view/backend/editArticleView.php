<?php
$title = 'Edition | '. $article->getTitle();
ob_start();
?>
<div class="row no-gutters">
	<div class="col-8">
		<h1 class="admin-section-title mt-5 mx-3">Editer un article</h1>
		<hr class="mx-3 my-0"/>
		<div class="row no-gutters">
			<form method="post" class="article-form ml-3" action="admin/editArticle/<?= $_GET['id'] ?>">
				<div class="input-group mb-3 mt-3">
					<span class="input-group-text">Titre</span>
					<input type="text" class="form-control" name="title" value="<?= $article->getTitle() ?>" required>
				</div>
				<textarea class="ml-3" id="tinymce" name="content"><?= $article->getContent() ?></textarea><br />
				<div class="text-right">
					<button type="submit" class="btn btn-dark">Editer</button>
				</div>
		</div>
	</div>
	<aside class="col-4 pl-5">
		<h1 class="admin-section-title mt-5 mx-3">Statut de l'article</h1>
		<hr class="mx-3 my-0"/>
		<div class="row mx-2 mt-3 pr-3">
    		<label class="class-form-label col-4" for="status"><b>Cet article doit être</b></label>
    		<select class="form-control col-8" name="status">
      			<option value="published" <?php if($article->getStatus() === 'published') { ?>selected<?php } ?>>publié</option>
		      	<option value="draft" <?php if($article->getStatus() === 'draft') { ?>selected<?php } ?>>un brouillon</option>
		      	<option value="trash" <?php if($article->getStatus() === 'trash') { ?>selected<?php } ?>>à la corbeille</option>
		    </select>
  		</div>
		<div class="text-right pr-4 mt-3">
					<button type="submit" class="btn btn-dark">Valider</button>
		</div>
		</form>
	</aside>
</div>

<?php

$content = ob_get_clean();
require_once 'template.php';