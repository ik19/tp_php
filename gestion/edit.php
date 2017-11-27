<?php  

require_once('../back/connexionBDD.php');

$success = false;

// verify if we have the email of the user to edit
if( !empty($_POST['actualEmail']) ){
	$actualEmail = htmlspecialchars( $_POST['actualEmail'] );
	$reqActualEmail = $pdo->prepare("	SELECT email FROM user WHERE email=:actualEmail	");
	$reqActualEmail->bindParam(':actualEmail',$actualEmail);
	$reqActualEmail->execute();
	$countActualEmail = $reqActualEmail->rowCount();
	// if email not exist UPDATE email else redirect with error
	if( $countActualEmail == 0){
		header("Location: ../gestion.php");		
	}
} else {
	header("Location: ../gestion.php");
}

// UPDATE NAME
if( !empty($_POST['name']) ){
	$name = htmlspecialchars( $_POST['name'] );
	$reqUpName = $pdo->prepare("	UPDATE user SET name=:name WHERE email=:actualEmail	");
	$reqUpName->bindParam(':name', $name);
	$reqUpName->bindParam(':actualEmail',$actualEmail);
	$reqUpName->execute();
	$_SESSION['name'] = $name ;
	$success = true;
}

// UPDATE DESCRIPTION
if( !empty($_POST['description']) ){
	$description = htmlspecialchars( $_POST['description'] );
	$reqUpDescr = $pdo->prepare("	UPDATE user SET description=:description WHERE email=:actualEmail	");
	$reqUpDescr->bindParam(':description', $description);
	$reqUpDescr->bindParam(':actualEmail',$actualEmail);
	$reqUpDescr->execute();
	$_SESSION['description'] = $description ;
	$success = true;
}

// UPDATE PASSWORD
if( !empty($_POST['actualPassword']) && !empty($_POST['password']) && !empty($_POST['password2']) ){

	$actualPassword = htmlspecialchars( $_POST['actualPassword'] );
	$password = htmlspecialchars( $_POST['password'] );
	$password2 = htmlspecialchars( $_POST['password2'] );

	// if new password not same
	if ($password !== $password2) {
		header("Location: ../gestion.php?modifier&passwordNotSame&email=$actualEmail");				
	} else {
		// select password from database
		$reqRecupMdp = $pdo->prepare("	SELECT password FROM user WHERE email=:actualEmail	");
		$reqRecupMdp->bindParam(':actualEmail', $actualEmail);
		$reqRecupMdp->execute();
		$resultReqMdp = $reqRecupMdp->fetch();
		$passDB = $resultReqMdp['password'];
		//if actual password isn't correct
		$correctPassword = password_verify($actualPassword, $passDB);
		if (!$correctPassword) {
			header("Location: ../gestion.php?modifier&passwordFalse&email=$actualEmail");				
		} else {
			$password = password_hash($password, PASSWORD_DEFAULT);
			$reqUpPass = $pdo->prepare("	UPDATE user SET password=:password WHERE email=:actualEmail	");
			$reqUpPass->bindParam(':password', $password);
			$reqUpPass->bindParam(':actualEmail',$actualEmail);
			$reqUpPass->execute();
			$success = true;
		}
	}
}

// UPDATE EMAIL
if( !empty($_POST['email']) ){
	$email = htmlspecialchars( $_POST['email'] );
	// verify if the email exist
	$reqEmail = $pdo->prepare("	SELECT email FROM user WHERE email=:email	");
	$reqEmail->bindParam(':email',$email);
	$reqEmail->execute();
	$countEmail = $reqEmail->rowCount();
	// if email not exist UPDATE email else redirect with error
	if( $countEmail == 0){
		$reqUpEmail = $pdo->prepare("	UPDATE user SET email=:email WHERE email=:actualEmail	");
		$reqUpEmail->bindParam(':email', $email);
		$reqUpEmail->bindParam(':actualEmail',$actualEmail);
		$reqUpEmail->execute();
		$actualEmail = $email ;
		$success = true;
	} else {
		header("Location: ../gestion.php?modifier&emailexist&email=$actualEmail");				
	}
}

if($success) {
	header("Location: ../gestion.php?modifier&successEdit&email=$actualEmail");
}
if( empty($_POST['name']) && empty($_POST['email']) && empty($_POST['password']) && empty($_POST['password2']) && empty($_POST['description']) ){
	header("Location: ../gestion.php?modifier&email=$actualEmail");
}
?>