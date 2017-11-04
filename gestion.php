<?php

session_start(); 

require_once('./back/connexionBDD.php');

// Vérifier si connecté, sinon rediriger vers la page de connexion
if(empty($_SESSION['id'])){
	header("Location: connexion.php");
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Gestion</title>
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">
</head>
<body>

<div class="container">
	<div class="row">
		<div class="twelve columns" style="margin-top: 20px">
			<h1>Gestion des utilisateurs</h1>

			<p style="color:#880000">
				<?php
					if(isset($_GET['delete'])){
						echo "Suppression réussie";
					}
					else if(isset($_GET['passwordNotSame'])){
						echo "Nouveaux mots de passe non-identiques";
					}
					else if(isset($_GET['passwordFalse'])){
						echo "Mot de passe actuel incorrect";
					}
					else if(isset($_GET['emailexist'])){
						echo "Email déjà existant";
					}
				?>
			</p>
			<p style="color:#008800">
				<?php
					if(isset($_GET['successRegister'])){
						echo "Ajout réussie";
					}
					else if(isset($_GET['successEdit'])){
						echo "Modification réussie";
					}
				?>
			</p>
			<?php
				if(isset($_GET['ajouter'])){
					require_once("./gestion/ajouter.php");
				}
				else if(isset($_GET['modifier'])){
					require_once("./gestion/modifier.php");
				}
				else{
					require_once("./gestion/afficher.php");					
				}
			?>


			<hr>
			<label>Liens</label>
			<a class="button" href="moncompte.php">Mon Compte</a>
			<a class="button button-primary" href="back/logout.php">Déconnexion</a>
		</div>
	</div>
</div>

</body>
</html>