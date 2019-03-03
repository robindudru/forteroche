<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="robots" content="noindex" />
	<base href="http://localhost/forteroche/">
	<title><?= $title ?></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="stylesheet" media="(min-width: 993px)" href="http://localhost/forteroche/public/css/admin_style.css">
	<link rel="stylesheet" media="(min-width: 0px) and (max-width: 767px)" href="http://localhost/forteroche/public/css/admin_style_smartphones.css">
	<link rel="stylesheet" media="(min-width:768px) and (max-width: 992px)" href="http://localhost/forteroche/public/css/admin_style_tablets.css">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
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
			<div class="col-7 col-md-8 col-lg-10 pl-lg-3 d-flex align-items-center" id="admin-links">
				<?php
				if(isset($_SESSION['username'])) {
					?>
					<div class="mx-1 mx-lg-3"><a href="admin">Accueil</a></div>
						<div class="mx-1 d-lg-flex mx-lg-1 flex-direction-column">
							<a href="admin/addArticle">Ajouter un article</a>
						</div>
						<div class="mx-1 mx-lg-5"><a target="_blank" href="">Voir le site</a></div>
						<?php
					}
					else {
						?>
						<div class="mx-lg-3"><a href=""><?= $title ?></a></div>
						<?php
					}
					?>
				</div>
				<div class="col-5 col-md-4 col-lg-2 d-flex">
					<div class="row align-items-center">
						<?php
						if(isset($_SESSION['username'])) {
							?>
							<div class="col-8 col-md-9 col-lg-9 text-right p-0">
								<span class="username"><?= $_SESSION["surname"]. ' ' . $_SESSION["name"] ?></span><br />
								<a href="admin/editProfile">Profil</a> - <a href="admin/disconnect">Deconnexion</a>	
							</div>
							<div class="col-4 col-md-3 col-lg-3"><img src="http://localhost/forteroche/public/assets/img/avatars/<?= $_SESSION["avatar"] ?>" /></div>
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