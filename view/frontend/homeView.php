<?php $title = 'Billet Simple pour l\'Alaska - Jean Forteroche';
$pageTitle = 'TABLE DES MATIERES';

ob_start(); ?>
	<div class="col-6 h-100 px-5 left-page">
		<nav id="chapter-list">
			<span class="neutral-xl-title">Table des matières</span><br /><br />
			<div class="d-flex flex-column">
				<?php 
				foreach ($articles as $article){
					$articleId = $article->getValue('id');
					$articleTitle = $article->getValue('title');
					$totalComments = $article->getValue('totalComments');
				?>
					<div style="width:100%;">
						<div class=float-left">
							<h2><a href="index.php?action=article&id=<?= $articleId ?>"><?= $articleTitle ?></a></h2>
						</div>
						<div class="float-right mt-2 ml-2">
							<i class="fas fa-comment"> </i> <?= $totalComments ?></i>
						</div>
						<div id="chapter-list-filler" class="mt-1">
							&nbsp;
						</div>
					</div>
				<?php
				}
				?>
			</div>
		</nav>
	</div>
	<div class="col-6 h-100 px-3 right-page">
		<span class="neutral-md-title">Derniers commentaires</span>
		<div id="last-comments" class="fluid-container no-gutters">
			<div class="row no-gutters">
				<?php 
				foreach ($comments as $comment){
					$articleId = $comment->getValue('articleId');
				?>
					<div class="col-6 mt-4">
						<div class="card mr-4">
							<div class="card-header d-flex justify-content-between">
								<?= $comment->getValue('author') ?>
								<span class="card-subtitle text-muted small">
									<a href="index.php?action=article&id=<?= $comment->getValue('articleId') ?>"><?= $comment->getValue('articleTitle') ?></a>
								</span>
							</div>
							<div class="card-body">
								<p class="card-text"><?php echo substr($comment->getValue('content'), 0, 200); if (strlen($comment->getValue('content')) > 200) { echo '...';} ?></p>
							</div>
						</div>
					</div>
				<?php
				}
				?>
			</div>
		</div>		
	</div>
	
<?php $content = ob_get_clean();
require_once('template.php');