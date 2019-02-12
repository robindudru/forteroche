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
			foreach ($articlesArray as $article){
			?>
				<div class="col-6">
					<div class="card mx-3 mt-4">
						<div class="card-header m-0 d-flex justify-content-between">
							<span class="admin-card-title">
								<a href="?mode=admin&action=editArticle&id=<?= $article->getValue('id') ?>">
									<?php
									$title= htmlspecialchars($article->getValue('title'));
									echo substr($title, 0, 50);
									if(strlen($title) > 50) echo '...';
									?>										
								</a>
							</span>
							<span class="card-subtitle text-muted small">
								<a href="?mode=admin&action=editArticle&id=<?= $article->getValue('id') ?>" title="Editer">
									<i class="fas fa-edit mr-1"></i>
								</a>
								<a href="?mode=admin&action=deleteArticle&id=<?= $article->getValue('id') ?>" title="Supprimer">
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
	</aside>
</div>
<?php

$content = ob_get_clean();
require_once('template.php');