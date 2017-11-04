<?php

session_start(); 

// Vérifier si connecté, sinon rediriger vers la page de connexion
if(!empty($_SESSION['id'])){
	header("Location: moncompte.php");
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Connexion</title>
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">
</head>
<body>

<div class="container">
	<div class="row">
		<div class="twelve columns" style="margin-top: 50px">
			<h1>Connexion</h1>
			<div class="twelve columns">
				<p style="color:#880000">
					<?php
						if(isset($_GET['champsvide'])){
							echo "remplir tout les champs";
						}
						else if(isset($_GET['error'])){
							echo "mot de passe ou email incorrect";
						}
					?>
				</p>
			</div>
			<form action="./back/login.php" method="POST">
				<div class="row">
					<div class="three columns">
						<label>Email</label>
						<input class="u-full-width" type="email" name="email" required>
						<label>Mot de Passe</label>
						<input class="u-full-width" type="password" name="password" required>
					</div>
				</div>
				<input class="button-primary" type="submit" value="Submit">
			</form>
		</div>
	</div>
</div>


</body>
</html>