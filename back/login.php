<?php  
session_start();

require_once('connexionBDD.php');

$email = htmlspecialchars( $_POST['email'] );
$password = htmlspecialchars( $_POST['password'] );


	if( !empty($email) && !empty($password) ){

		$reqEmail = $pdo->prepare("	SELECT email FROM user WHERE email=:email	");
		$reqEmail->bindParam(':email', $email);
		$reqEmail->execute();
		$count = $reqEmail->rowCount();

		// Si Email existant
		if($count == 1){

			$reqRecup = $pdo->prepare("	SELECT * FROM user WHERE email=:email	");
			$reqRecup->bindParam(':email', $email);
			$reqRecup->execute();

			$resultReq = $reqRecup->fetch();
			$passDB = $resultReq['password'];

			$correctPassword = password_verify($password, $passDB);

			// Si le Password est correcte
			if($correctPassword){

				$_SESSION['name'] = $resultReq['name'];
				$_SESSION['id'] = $resultReq['id'];
				$_SESSION['email'] = $resultReq['email'];
				$_SESSION['description'] = $resultReq['description'];

				header("Location: ../moncompte.php?bienvenue");				

			} else {
			header("Location: ../connexion.php?error");
			}

		} else {
			header("Location: ../connexion.php?error");
		}

	} else {
		header("Location: ../connexion.php?champsvide");
	}
?>