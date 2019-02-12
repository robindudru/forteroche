<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?= $title ?></title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="stylesheet" href="./public/css/style.css">
		<script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=uhyykhime2vq6i59wnrvg33bjmuadk82qs7rw0jfiu26a5hm"></script>
		<script>
  			tinymce.init({
    			selector: '#tinymce'
  			});
  		</script>
	</head>

	<body>
		<div id="admin-nav">
			<nav class="row no-gutters h-100">
				<div class="col-10 pl-3 d-flex align-items-center" id="admin-links">
					<?php
					if(isset($_SESSION['username'])) {
					?>
						<div class="mx-3"><a href="?mode=admin">Accueil</a></div>
						<div class="mx-3"><a href="?mode=admin&action=addArticle">Ajouter un article</a></div>
						<div class="mx-5"><a target="_blank" href="index.php">Voir le site</a></div>
					<?php
					}
					else {
					?>
						<div class="mx-3"><a href=""><?= $title ?></a></div>
					<?php
					}
					?>
				</div>
				<div class="col-2 d-flex">
					<div class="row align-items-center">
						<?php
						if(isset($_SESSION['username'])) {
						?>
							<div class="col-9 text-right p-0">
								<span class="username"><?= $_SESSION["username"] ?></span><br/>
								<a href="">Profil</a> - <a href="?mode=admin&action=disconnect">Deconnexion</a>	
							</div>
							<div class="col-3"><img src="./public/assets/img/avatars/<?= $_SESSION["avatar"] ?>" /></div>
						<?php
						}
						?>
					</div>
				</div>
			</nav>
		</div>
		<div class="content-wrapper">
			<?= $content ?>
		</div>
	</body>
</html>