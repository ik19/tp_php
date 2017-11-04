

<div class="twelve columns">
	<br>
	<a class="button" href="gestion.php">retour</a>
	<h4 style="color:#009070">Modifier :</h4>
	<form action="./gestion/edit.php" method="POST">
		<div class="row">

		<?php
			$req = $pdo->prepare("	SELECT name,email,description FROM user WHERE email = :email	");
			$req->bindParam(':email',$_GET['email']);
			$req->execute();
			while($ligne = $req->fetch()){	
		?>
			<div class="three columns">
				<label>Nom*</label>
				<input class="u-full-width" type="text" name="name" placeholder="<?php echo $ligne['name']; ?>">
				<label>Email*</label>
				<input class="u-full-width" type="email" name="email" placeholder="<?php echo $ligne['email']; ?>">
			</div>
			<div class="three columns">
				<label>Mot de Passe Actuel</label>
				<input class="u-full-width" type="password" name="actualPassword" placeholder="********">
				<label>Nouveau Mot de Passe</label>
				<input class="u-full-width" type="password" name="password" placeholder="********">
				<label>Confirmer Nouveau Mot de Passe</label>
				<input class="u-full-width" type="password" name="password2" placeholder="********">
			</div>
			<div class="three columns">
				<label>Description</label>
				<textarea class="u-full-width" type="text" name="description" placeholder="<?php echo $ligne['description']; ?>"></textarea>
				<input type="hidden" name="actualEmail" value="<?php echo $_GET['email']; ?>">
			</div>
		<?php
			}
		?>

		</div>
		<input class="button-primary" type="submit" value="Submit">
	</form>
</div>
