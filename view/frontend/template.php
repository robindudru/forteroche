<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?= $title ?></title>
		<meta name="description" content="Billet simple pour l'Alaska, le nouveau livre de Jean Forteroche publié en ligne épisodes par épisodes !">
	  	<meta property="og:title" content="Billet Simple pour l'Alaska - Le livre en ligne de Jean Forteroche" />
	  	<meta property="og:type" content="website" />
		<meta property="og:url" content="http://www.robindupontdruaux.fr/forteroche/" />
		<meta property="og:image" content="./public/assets/img/logo.png" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="stylesheet" href="./public/css/style.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E=" crossorigin="anonymous"></script>
	</head>

	<body class="container-fluid p-0">
		<div class="row h-100 no-gutters">
			<div class="col-6 h-100 px-5 left-page">
				<header class="row mb-4 top-header">
					<h1>BILLET SIMPLE POUR L'ALASKA</h1>
				</header>
				<?= $contentLeft ?>
			</div>
			<div class="col-6 h-100 px-3 right-page">
				<header class="row mb-4 top-header">
					<h1><?= $pageTitle ?></h1>
				</header>
				<?= $contentRight ?>
			</div>
		</div>
	</body>
</html>