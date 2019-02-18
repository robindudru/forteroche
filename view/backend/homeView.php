<?php
$title = 'Accueil | Administration';
ob_start();
?>
<div class="row no-gutters">
	<div class="col-8">
		<h1 class="admin-section-title mt-5 mx-3">Gestion des articles</h1>
		<hr class="mx-3 my-0"/>
		<div class="row no-gutters">
			<?php
			foreach ($articles as $article){
			?>
				<div class="col-6">
					<div class="card mx-3 mt-4">
						<div class="card-header m-0 d-flex justify-content-between">
							<span class="admin-card-title">
								<a href="?mode=admin&action=editArticle&id=<?= $article->getValue('id') ?>">
									<?php
									$articleTitle= htmlspecialchars($article->getValue('title'));
									echo substr($articleTitle, 0, 50);
									if(strlen($articleTitle) > 50) echo '...';
									?>										
								</a>
							</span>
							<span class="card-subtitle text-muted small">
								<a href="?mode=admin&action=editArticle&id=<?= $article->getValue('id') ?>" title="Editer">
									<i class="fas fa-edit mr-1"></i>
								</a>
								<a href="?mode=admin&confirm=deleteArticle&id=<?= $article->getValue('id') ?>" title="Supprimer">
									<i class="fas fa-trash-alt"></i>
								</a>
							</span>
						</div>
						<div class="card-body">
							<p class="card-text">
								<?php echo substr($article->getValue('content'), 0, 400); if (strlen($article->getValue('content')) > 400)  echo '...'; ?>		
							</p>
						</div>
					</div>
				</div>
			<?php
			}
			?>
		</div>
	</div>
	<aside class="col-4 pl-5">
		<h1 class="admin-section-title mt-5 mx-3">Commentaires signales</h1>
		<hr class="mx-3 my-0"/>
		<?php 
				foreach ($signaled as $comment){
					$articleId = $comment->getValue('articleId');
				?>
					<div class="col-12 mt-4">
						<div class="card mr-4">
							<div class="card-header d-flex justify-content-between">
								<?= $comment->getValue('author') ?>
								<span class="card-subtitle text-muted small">
									signalé <?= $comment->getValue('signaled') ?> fois 
									<a title="Valider ce commentaire" href="?mode=admin&confirm=approveComment&id=<?= $comment->getValue('id') ?>"><i class="fas fa-check-square ml-2"></i></a>
									<a title="Supprimer ce commentaire" href="?mode=admin&confirm=deleteComment&id=<?= $comment->getValue('id') ?>"><i class="fas fa-times ml-2"></i></a>
								</span>
							</div>
							<div class="card-body">
								<p class="card-text"><?= $comment->getValue('content') ?></p>
							</div>
						</div>
					</div>
				<?php
				}
				?>
	</aside>
	<div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="confirmLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Avertissement</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      </div>
	      <div class="modal-footer">
	        <a id="confirm" href=""><button type="button" class="btn btn-secondary" data-dismiss="modal">Confirmer</button></a>
	        <a id="cancel" href=""><button type="button" class="btn btn-primary">Annuler</button></a>
	      </div>
	    </div>
	  </div>
	</div>
</div>
<?php

$content = ob_get_clean();
require_once('template.php');
 ?>