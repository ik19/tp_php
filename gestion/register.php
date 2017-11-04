<?php  

require_once('../back/connexionBDD.php');

$name = htmlspecialchars( $_POST['name'] );
$email = htmlspecialchars( $_POST['email'] );
$password = htmlspecialchars( $_POST['password'] );
$password2 = htmlspecialchars( $_POST['password2'] );
$description = htmlspecialchars( $_POST['description'] );


	if( !empty($name) && !empty($email) && !empty($password) && !empty($password2) && !empty($description) ){
	
		$reqEmail = $pdo->prepare("	SELECT email FROM user WHERE email=:email");
		$reqEmail->bindParam(':email',$email);
		$reqEmail->execute();
		$countEmail = $reqEmail->rowCount();
		if( $countEmail !== 1){

			if ($password == $password2) {

				$password = password_hash($password, PASSWORD_DEFAULT);

				$req = $pdo->prepare("	INSERT INTO user (name, email, password, description) VALUES (:name, :email, :password, :description)	");
				$req->bindParam(':name', $name);
				$req->bindParam(':email', $email);
				$req->bindParam(':password', $password);
				$req->bindParam(':description', $description);
				$req->execute();

				header("Location: ../gestion.php?successRegister");

			} else {
				header("Location: ../gestion.php?ajouter&password");
			}
		} else {
			header("Location: ../gestion.php?ajouter&email");
		}
	} else {
		header("Location: ../gestion.php?ajouter&champsvide");
	}
?>