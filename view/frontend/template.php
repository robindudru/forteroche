<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<base href="http://localhost/forteroche/">
		<title>Billet simple pour l'Alaska - <?= $title ?></title>
		<meta name="description" content="Billet simple pour l'Alaska, le nouveau livre de Jean Forteroche publié en ligne épisodes par épisodes !">
	  	<meta property="og:title" content="Billet Simple pour l'Alaska - Le livre en ligne de Jean Forteroche" />
	  	<meta property="og:type" content="website" />
		<meta property="og:url" content="http://www.robindupontdruaux.fr/forteroche/" />
		<meta property="og:image" content="./public/assets/img/logo.png" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="stylesheet" media="(min-width: 993px)" href="http://localhost/forteroche/public/css/style.css">
		<link rel="stylesheet" media="(min-width: 0px) and (max-width: 767px)" href="http://localhost/forteroche/public/css/style_smartphones.css">
		<link rel="stylesheet" media="(min-width:768px) and (max-width: 992px)" href="http://localhost/forteroche/public/css/style_tablets.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=uhyykhime2vq6i59wnrvg33bjmuadk82qs7rw0jfiu26a5hm"></script>
		<script>
  			tinymce.init({
    			selector: '#article-comment-tinymce',
    			menubar: false,
    			toolbar: 'undo redo | styleselect | bold italic | link image',
    			resize: false,
  			});
  		</script>
	</head>

	<body class="container-fluid p-0 relative">
		<div id="hamburger" class="d-block d-lg-none"><i class="fas fa-bars"></i></div>
		<div id="drawer-menu" class="d-block d-lg-none">
			<div id="drawer-close" class="d-block d-lg-none text-right mr-2 pr-1"><i class="fas fa-times"></i></div>
			<div class="">
				<?php 
				foreach ($articles as $article){
					$articleId = $article->getId();
					$articleTitle = $article->getTitle();
				?>
				<div class="mx-3">
					<h2><a href="article--<?= Model\StringManager::slug($articleTitle) ?>-<?= $articleId ?>"><?= $articleTitle ?></a></h2>
				</div>
				<?php
				}
				?>
			</div>
		</div>
		<div class="row no-gutters">
			<div class="col-sm-12 col-lg-6 h-100">
				<header class="row mb-4 top-header">
					<h1><a href="">BILLET SIMPLE POUR L'ALASKA</a></h1>
				</header>
			</div>
			<div class="col-lg-6 d-none d-lg-block h-100 top-right-header">
				<header class="row mb-4 top-header">
					<h1>
						<?= $pageTitle ?>
						<?php if (isset($nav)) { ?>
							<a href="" data-toggle="modal" data-target="#article-comments">
								<i class="fas fa-comment ml-3 mr-1"></i><?= $totalComments ?>
							</a>
						<?php } ?>
					</h1>
				</header>
			</div>
		</div>
		<div class="row no-gutters main-content relative">
			<?= $content ?>
		</div>
		<div class="row no-gutters relative footer-wrapper">
			<div class="d-none d-lg-block separator"></div>
			<div class="d-none d-lg-block col-lg-6 h-100">
				<footer class="row no-gutters mb-4 footer-left pt-4">
					<?php if (isset($nav)) { ?>
					<div class="col-3">
						<span id="prev"><a href="#"><i class="fas fa-chevron-left mr-1 ml-4"></i> PAGE PRECEDENTE</a></span>
					</div>
					<div class="col-6 offset-3">
						<?php if($prevArticle !== 'first') { ?>
						<a href="article--<?= $prevArticle['title'] ?>-<?= $prevArticle['id'] ?>">CHAPITRE PRECEDENT</a>
						<?php } ?>
					</div>
					<?php } 
					else { ?>
						<h2>UN LIVRE EN LIGNE DE <?= $admin->getSurname() . ' ' . $admin->getName() ?></h2>
					<?php } ?>
				</footer>
			</div>
			<div class="d-none d-lg-block col-lg-6 top-right-header">
				<footer class="row mb-4 footer-right no-gutters pt-4">
					<?php if (isset($nav)) { ?>
					<div class="col-6">
						<?php if($nextArticle !== 'last') { ?>
							<a href="article--<?= $nextArticle['title'] ?>-<?= $nextArticle['id'] ?>">CHAPITRE SUIVANT</a>
						<?php } ?>
					</div>
					<div class= "col-3 offset-3">
						<span id="next"><a href="#">PAGE SUIVANTE <i class="fas fa-chevron-right"></i></a></span>
					</div>
					<?php }
					else { ?>
						<h2>(c) <?= $admin->getSurname() . ' ' . $admin->getName() ?> - 2019 | <a href="admin">Espace Administration</a></h2>
					<?php } ?>
				</footer>
			</div>
			<div class="d-block d-lg-none col-12 h-100">
				<footer class="row mb-4 no-gutters pt-4 phone-footer d-flex justify-content-center align-content-center">
					<span>(c) <?php if (isset($admin)){ echo $admin->getSurname() . ' ' . $admin->getName() . ' - '; } ?> 2019 | <a href="admin">Espace Administration</a></span>
				</footer>
			</div>
		</div>
	</body>
</html>

<script src="./public/js/Hamburger.js"></script>
<script>
	const hamburger = new Hamburger();
</script>