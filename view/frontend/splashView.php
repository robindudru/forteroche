<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<base href="http://localhost/forteroche/">
		<title>Billet simple pour l'Alaska - Un livre en ligne de Jean Forteroche</title>
		<meta name="description" content="Billet simple pour l'Alaska, le nouveau livre de Jean Forteroche publié en ligne épisodes par épisodes !">
	  	<meta property="og:title" content="Billet Simple pour l'Alaska - Le livre en ligne de Jean Forteroche" />
	  	<meta property="og:type" content="website" />
		<meta property="og:url" content="http://www.robindupontdruaux.fr/forteroche/" />
		<meta property="og:image" content="./public/assets/img/logo.png" />
		<link rel="stylesheet" href="http://localhost/forteroche/public/css/style.css">
		<link rel="stylesheet" media="(max-width: 768px)" href="http://localhost/forteroche/public/css/style_smartphones.css">
		<link rel="stylesheet" media="(max-width: 992px)" href="http://localhost/forteroche/public/css/style_tablets.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	</head>
	<body class="fluid-container">
		<div id="splashscreen" class="row d-flex flex-column h-100 no-gutters justify-content-center align-items-center">
			<h1>Billet simple pour l'Alaska</h1>
			<h2>Un livre en ligne de Jean Forteroche</h2>
			<form method="post" action="">
				<input name="enter" type="hidden" value="enter">
				<button class="btn btn-light mt-5" type="submit">Commencer a lire</button>
			</form>
		</div>
	</body>
</html>

<script>
	$('#splashscreen h1').css('opacity', '0');
	$('#splashscreen h2').css('opacity', '0');
	$('#splashscreen button').css('opacity', '0');
	setTimeout(() => {
		$('#splashscreen h1').animate({opacity:1}, 700);
	}, 1000);
	setTimeout(() => {
		$('#splashscreen h2').animate({opacity:1}, 700);
	}, 2000);
	setTimeout(() => {
		$('#splashscreen button').animate({opacity:1}, 700);
	}, 3000);
</script>