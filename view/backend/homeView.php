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
								<a href="?mode=admin&action=editArticle&id=<?= $article->getId() ?>">
									<?php
									$articleTitle= htmlspecialchars($article->getTitle());
									echo substr($articleTitle, 0, 50);
									if(strlen($articleTitle) > 50) echo '...';
									?>										
								</a>
							</span>
							<span class="card-subtitle text-muted small">
								<a href="?mode=admin&action=editArticle&id=<?= $article->getId() ?>" title="Editer">
									<i class="fas fa-edit mr-1"></i>
								</a>
								<a href="?mode=admin&confirm=deleteArticle&id=<?= $article->getId() ?>" title="Supprimer">
									<i class="fas fa-trash-alt"></i>
								</a>
							</span>
						</div>
						<div class="card-body">
							<p class="card-text">
								<?php echo substr($article->getContent(), 0, 400); if (strlen($article->getContent()) > 400)  echo '...'; ?>		
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
					$articleId = $comment->getArticleId();
				?>
					<div class="col-12 mt-4">
						<div class="card mr-4">
							<div class="card-header d-flex justify-content-between">
								<?= $comment->getAuthor() ?>
								<span class="card-subtitle text-muted small">
									signalé <?= $comment->getSignaled() ?> fois 
									<a title="Valider ce commentaire" href="?mode=admin&confirm=approveComment&id=<?= $comment->getId() ?>"><i class="fas fa-check-square ml-2"></i></a>
									<a title="Supprimer ce commentaire" href="?mode=admin&confirm=deleteComment&id=<?= $comment->getId() ?>"><i class="fas fa-times ml-2"></i></a>
								</span>
							</div>
							<div class="card-body">
								<p class="card-text"><?= $comment->getContent() ?></p>
							</div>
						</div>
					</div>
				<?php
				}
				?>
	</aside>
</div>
<?php

$content = ob_get_clean();
require_once('template.php');
 ?>