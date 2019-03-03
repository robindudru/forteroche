<?php
$title = 'Espace Administration | Edition du profil';
ob_start();
?>

<div class="row no-gutters h-100 d-flex justify-content-center">
	<div class="col-10 col-lg-6 relative">
		<div class="card profile-modal my-5">
			<div class="card-header m-0 d-flex justify-content-between">
				<span class="admin-card-title">
					Editer mon profil
				</span>
			</div>
			<div class="card-body">
				<p class="card-text text-center">
					<form method="post" action="admin/editProfile">
						<input type="hidden" name="id" value="<?= $user->getId() ?>" required>
  						<div class="form-group">
    						<label for="username">Pseudonyme</label>
    						<input type="text" name="username" class="form-control" id="username" placeholder="Pseudonyme" value="<?= $user->getUsername() ?>" required>
 						</div>
 						<div class="form-group">
    						<label for="surname">Prénom</label>
    						<input type="text" name="surname" class="form-control" id="surname" placeholder="Prénom" value="<?= $user->getSurname() ?>" required>
 						</div>
 						<div class="form-group">
    						<label for="name">Nom</label>
    						<input type="text" name="name" class="form-control" id="name" placeholder="Nom" value="<?= $user->getName() ?>" required>
 						</div>
  						<div class="form-group">
    						<label for="password">Nouveau mot de passe</label>
    						<input type="password" name="password" class="form-control" id="password" placeholder="Mot de passe">
    						<small id="passwordHelp" class="form-text text-muted">Laissez ce champ vide si vous ne souhaitez pas changer de mot de passe.</small>
  						</div>
  						<div class="form-group">
    						<label for="passwordConfirm">Confirmer le mot passe</label>
    						<input type="password" name="passwordConfirm" class="form-control" id="passwordConfirm" placeholder="Confirmation du mot de passe">
    						<small id="passwordHelp" class="form-text text-muted">Si vous changez de mot de passe, saisissez le à nouveau.</small>
  						</div>
  						<div class="form-group">
    						<label for="twitter">Twitter</label>
    						<input type="text" name="twitter" class="form-control" id="twitter" placeholder="Nom d'utilisateur Twitter" value="<?= $user->getTwitter() ?>">
 						</div>
 						<div class="form-group">
    						<label for="facebook">Facebook</label>
    						<input type="text" name="facebook" class="form-control" id="name" placeholder="Nom d'utilisateur Facebook" value="<?= $user->getFacebook() ?>">
 						</div>
 						<div class="form-group">
    						<label for="instagram">Instagram</label>
    						<input type="text" name="instagram" class="form-control" id="instagram" placeholder="Nom d'utilisateur Instagram" value="<?= $user->getInstagram() ?>">
 						</div>
  						
				</p>
				<div class="text-center">
					<button type="submit" class="btn btn-dark">Mettre à jour</button>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php

$content = ob_get_clean();
require_once 'template.php';