<?php
$title = 'Espace Administration | Succès !';
ob_start();
?>

<div class="row no-gutters h-100 d-flex justify-content-center">
	<div class="col-10 col-lg-6 relative">
		<div class="card admin-modal">
			<div class="card-header m-0 d-flex justify-content-between">
				<span class="admin-card-title">
					Administration - Succes !
				</span>
			</div>
			<div class="card-body">
				<p class="card-text text-center">
					<?= $message ?>
				</p>
				<div class="text-center">
					<a href="admin"><button class="btn btn-dark">Retour</button></a>
				</div>
			</div>
		</div>
	</div>
</div>

<?php

$content = ob_get_clean();
require_once 'template.php';