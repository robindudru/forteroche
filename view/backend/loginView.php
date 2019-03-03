<?php
$title = 'Jean Forteroche - Espace Administration';
ob_start();
?>

<div class="row no-gutters h-100 d-flex justify-content-center">
	<div class="col-11 col-lg-6 relative">
		<div class="card admin-modal">
			<div class="card-header m-0 d-flex justify-content-between">
				<span class="admin-card-title">
					ESPACE ADMINISTRATION - CONNEXION
				</span>
			</div>
			<div class="card-body">
				<p class="card-text">
					Vous essayez d'entrer dans l'espace d'administration de ce site. Seuls les auteurs autorisés peuvent se connecter. Si vous n'arrivez pas à vous connecter, contactez l'administrateur à <a href="mailto:jean@forteroche.fr"><u>cette adresse</u></a>.
				</p>
				<form method="post" id="login-form" action="admin/login">
					<div class="input-group mb-3 mt-5">
						<span class="input-group-text">Nom d'utilisateur</span>
						<input type="text" class="form-control" name="username" required>
					</div>
					<div class="input-group mb-3">
						<span class="input-group-text">Mot de passe</span>
						<input type="password" class="form-control" name="password" required>
					</div>
					<div class="text-center">
						<button type="submit" class="btn btn-dark">Envoyer</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php

$content = ob_get_clean();
require_once 'template.php';