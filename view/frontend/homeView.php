<?php $title = 'Billet Simple pour l\'Alaska - Jean Forteroche';
$pageTitle = 'TABLE DES MATIERES'; ?>

<?php ob_start(); ?>
	<nav id="chapter-list">
		<span class="neutral-xl-title">Table des matières</span><br /><br />
		<?php 
		while ($data = $articles->fetch()){
		?>
			<h2><a href="index.php?action=article&id=<?= $data['id'] ?>"><?= htmlspecialchars($data['title']) ?></a></h2>
		<?php
		}
		$articles->closeCursor();
		?>
	</nav>
<?php $contentLeft = ob_get_clean();
ob_start(); ?>
	<span class="neutral-md-title">Derniers commentaires</span>
	<div id="last-comments" class="fluid-container no-gutters">
		<div class="row no-gutters">
			<?php 
			while ($data = $lastComments->fetch()){
			$fetchTitle = $commentManager->getArticleTitle($data['article_id']);
			$articleTitle = $fetchTitle->fetch();
			?>
				<div class="col-6 mt-4">
					<div class="card mr-4">
						<div class="card-header d-flex justify-content-between">
							<?= $data['author'] ?>
							<span class="card-subtitle text-muted small">
								<a href="index.php?action=article&id=<?= $data['article_id'] ?>"><?= $articleTitle['title']?></a>
							</span>
						</div>
						<div class="card-body">
							<p class="card-text"><?php echo substr($data['content'], 0, 200); if (strlen($data['content']) > 200) { echo '...';} ?></p>
						</div>
					</div>
				</div>
			<?php
			}
			$articles->closeCursor();
			?>
		</div>
	</div>
<?php $contentRight = ob_get_clean();
require_once('template.php');