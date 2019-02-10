<?php $title = 'Billet Simple pour l\'Alaska - Jean Forteroche';
$pageTitle = 'TABLE DES MATIERES'; ?>

<?php ob_start(); ?>
	<nav id="chapter-list">
		<span class="neutral-xl-title">Table des matières</span><br /><br />
		<?php 
		foreach ($articlesArray as $article){
		?>
			<h2><a href="index.php?action=article&id=<?= $article->getValue('id') ?>"><?= htmlspecialchars($article->getValue('title')) ?></a></h2>
		<?php
		}
		?>
	</nav>
<?php $contentLeft = ob_get_clean();
ob_start(); ?>
	<span class="neutral-md-title">Derniers commentaires</span>
	<div id="last-comments" class="fluid-container no-gutters">
		<div class="row no-gutters">
			<?php 
			foreach ($commentsArray as $comment){
				$articleId = $comment->getValue('articleId');
			?>
				<div class="col-6 mt-4">
					<div class="card mr-4">
						<div class="card-header d-flex justify-content-between">
							<?= $comment->getValue('author') ?>
							<span class="card-subtitle text-muted small">
								<a href="index.php?action=article&id=<?= $comment->getValue('articleId') ?>">TITRE</a>
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
<?php $contentRight = ob_get_clean();
require_once('template.php');