<?php
$title = "Billet simple pour l'Alaska | Succes !";
ob_start();
?>

<div class="row no-gutters h-100 d-flex justify-content-center">
	<div class="col-6 relative">
		<div class="card admin-modal">
			<div class="card-header m-0 d-flex justify-content-between">
				<span class="admin-card-title">
					Succes !
				</span>
			</div>
			<div class="card-body">
				<p class="card-text text-center">
					<?= $message ?>
				</p>
				<div class="text-center">
					<a href="?action=article&id=<?= $_GET['id'] ?>"><button class="btn btn-dark">Retour</button></a>
				</div>
			</div>
		</div>
	</div>
</div>

<?php

$content = ob_get_clean();
require_once('./view/backend/template.php');