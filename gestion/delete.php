<?php  

require_once('../back/connexionBDD.php');

$email = htmlspecialchars( $_GET['email'] );

	if( !empty($email) ){
		$reqDelete = $pdo->prepare("	DELETE FROM user WHERE email=:email	");
		$reqDelete->bindParam(':email',$email);
		$reqDelete->execute();
		header("Location: ../gestion.php?delete");
	}
?>