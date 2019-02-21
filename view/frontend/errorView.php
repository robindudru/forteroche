<?php
$title = "Billet simple pour l'Alaska | Oh, vous avez tout casse";
ob_start();
?>

<div class="row no-gutters h-100 d-flex justify-content-center">
	<div class="col-6 relative">
		<div class="card admin-modal">
			<div class="card-header m-0 d-flex justify-content-between">
				<span class="admin-card-title">
					Oh la ! Rien ne va plus !
				</span>
			</div>
			<div class="card-body">
				<p class="card-text text-center">
					Apparemment, quelque chose s'est mal passé... Voilà la raison :<br /><br />
					<b><?= $errorMessage ?></b><br /><br />
					Si pour vous cela n'a pas de sens, contactez <a href="mailto:jean@forteroche.com"><u>l'administrateur de ce site</u></a> et donnez lui ce texte d'erreur. Précisez aussi ce que vous avez fait pour en arriver là. Pas de panique, tout va rentrer dans l'ordre...
				</p>
				<div class="text-center">
					<a href="index.php"><button class="btn btn-dark">Retour</button></a>
				</div>
			</div>
		</div>
	</div>
</div>

<?php

$content = ob_get_clean();
require_once('./view/backend/template.php');