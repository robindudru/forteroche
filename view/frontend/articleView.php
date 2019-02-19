<?php $title = $article->getTitle();
$nav = true;
$pageTitle = $article->getTitle();
$title = $pageTitle;
$articleContent = $article->getContent();
$totalComments = $article->getTotalComments();

ob_start(); ?>
<div class="separator"></div>
<div class="col-12 h-100 article-two-pages relative">
	<h1 class="pl-5">
	    <?= $title ?>
	</h1>
	<p id="leftContent">
		<?= $articleContent ?>
	</p>
</div>

<div class="modal fade" id="article-comments" tabindex="-1" role="dialog" aria-labelledby="commentaires" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title comments-title">Commentaires</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-0 p-0">
        <?php
        foreach ($comments as $comment) { ?>
			<div class="article-comment p-3"> 
        		<span class="comment-author"><?= $comment->getAuthor() ?></span><a title="Signaler ce commentaire" href="?action=article&id=<?= $_GET['id'] ?>&signal=<?= $comment->getId() ?>"><i class="fas fa-exclamation-circle ml-2"></i></a><br />
        		<span class="comment-content"><?= $comment->getContent() ?></span>
        	</div>
        <?php } ?>
      </div>
      <div class="modal-footer text-left row no-gutters">
        <h5 class="col-12 comments-title pl-4">Ecrire un commentaire</h5>
        <form method="post" class="article-comment-form" action="?action=article&id=<?= $_GET['id'] ?>">
        	<div class="input-group col-12 mb-3 mt-3">
					<input type="text" class="form-control" name="username">
					<span class="input-group-text">Pseudo</span>
			</div>
			<div class="col-12 px-3 mx-auto">
				<textarea id="article-comment-tinymce" name="content"></textarea><br />
			</div>
			<button type="submit" class="btn btn-dark col-8 offset-2">Commenter</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php $content = ob_get_clean();
require_once('template.php');
?>

<script src="./public/js/Pager.js"></script>
<script>
const pager = new Pager();
</script>

