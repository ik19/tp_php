<?php

	try {
	
		$pdo = new PDO('mysql:host=localhost;dbname=testbase;charset=utf8', 'root', '');
	
	}
	
	catch(exception $e) {
	
		die('Erreur '.$e->getMessage());
	
	}

?>