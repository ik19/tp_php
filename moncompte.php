<?php

session_start(); 

// Vérifier si connecté, sinon rediriger vers la page de connexion
if(empty($_SESSION['id'])){
	header("Location: connexion.php");
}

?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Page Privée</title>
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">
</head>
<body>

<div style="width: 100%;height: 8px;position:absolute;background-color:#880000 ">
</div>

<div class="container">
	<div class="row">
		<div class="twelve columns" style="margin-top: 50px">
			<?php
				if(isset($_GET['bienvenue'])){
			?>
				<div class="twelve columns">
					<p style="color:#880000"><?php echo "Heureux de te retrouver ".$_SESSION['name']. " !"; ?></p>
				</div>
			<?php
				}
			?>
			<h1>Page privée</h1>
			<div class="twelve columns">
				<h4 style="color:#009070">Infomations Personnels :</h4>
				<p>
					<strong>Email : </strong><?php echo $_SESSION['email']; ?><br>
					<strong>Nom : </strong><?php echo $_SESSION['name']; ?><br>
					<strong>Description : </strong><?php echo $_SESSION['description']; ?>					
				</p>
			</div>
		</div>
		<div class="twelve columns">
			<hr>
			<label>Liens</label>
			<a class="button" href="gestion.php">Gestion</a>
			<a class="button button-primary" href="./back/logout.php">Déconnexion</a>
		</div>
	</div>
</div>

</body>
</html>
