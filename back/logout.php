<?php
	session_start();

	//on supprime toutes les données de $_SESSION
	session_destroy();
	header("Location: ../connexion.php");
?>