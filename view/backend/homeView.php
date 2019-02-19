<?php
$title = 'Accueil | Administration';
ob_start();
?>
<div class="row no-gutters">
	<div class="col-8">
		<div class="row mt-5">
			<div class="col-5">
				<h1 class="admin-section-title mx-3">Gestion des articles</h1>
			</div>
			<div class="col-7 h-50 d-flex flex-row justify-content-end">
				<button id="published" class="btn btn-dark mx-2">Publies</button>
				<button id="draft" class="btn btn-dark mx-2">Brouillons</button>
				<button id="trash" class="btn btn-dark mx-2 h-60">Corbeille</button>
			</div>
		</div>
		<hr class="mx-3 my-0"/>
		<div class="row no-gutters">
			<?php
			if (empty($publishedArticles)){ ?>
				<div class="publishedArticle"></div>
			<?php }
			else {
				foreach ($publishedArticles as $article){
				?>
					<div class="col-6 publishedArticle active">
						<div class="card mx-3 mt-4">
							<div class="card-header m-0 d-flex justify-content-between">
								<span class="admin-card-title">
									<a href="?mode=admin&action=editArticle&id=<?= $article->getId() ?>">
										<?php
										$articleTitle= $article->getTitle());
										echo substr($articleTitle, 0, 50);
										if(strlen($articleTitle) > 50) echo '...';
										?>										
									</a>
								</span>
								<span class="card-subtitle text-muted small">
									<a href="?mode=admin&action=editArticle&id=<?= $article->getId() ?>" title="Editer">
										<i class="fas fa-edit mr-1"></i>
									</a>
									<a href="?mode=admin&confirm=trashArticle&id=<?= $article->getId() ?>" title="Mettre à la corbeille">
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
			}
			if (empty($draftArticles)){ ?>
				<div class="draftArticle"></div>
			<?php }
			else {
				foreach ($draftArticles as $article){
				?>
					<div class="col-6 draftArticle">
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
									<a href="?mode=admin&confirm=trashArticle&id=<?= $article->getId() ?>" title="Mettre à la corbeille">
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
			}
			if (empty($trashArticles)){ ?>
				<div class="trashArticle"></div>
			<?php }
			else {
				foreach ($trashArticles as $article){
				?>
					<div class="col-6 trashArticle">
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
										<i class="fas fa-times-circle"></i>
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

 <script src="./public/js/ArticlesCategoriesNav.js"></script>
<script>
 const articlesNav = new ArticlesCategoriesNav();
</script>