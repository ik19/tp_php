<div class="twelve columns">
	<br>
	<a class="button" href="gestion.php">retour</a>
	<h4 style="color:#009070">Ajouter :</h4>
	<div class="twelve columns">
		<p style="color:#880000">
			<?php
				if(isset($_GET['champsvide'])){
					echo "Remplir tout les champs";
				}
				else if(isset($_GET['password'])){
					echo "Mot de passe incorrect";
				}
				else if(isset($_GET['email'])){
					echo "Email déjà existant";
				}
			?>
		</p>
	</div>
	<form action="./gestion/register.php" method="POST">
		<div class="row">
			<div class="three columns">
				<label>Nom*</label>
				<input class="u-full-width" type="text" name="name" required>
				<label>Email*</label>
				<input class="u-full-width" type="email" name="email" required>
			</div>
			<div class="three columns">
				<label>Mot de Passe*</label>
				<input class="u-full-width" type="password" name="password" required>
				<label>Confirmer Mot de Passe*</label>
				<input class="u-full-width" type="password" name="password2" required>
			</div>
			<div class="three columns">
				<label>Description*</label>
				<input class="u-full-width" type="text" name="description" required>
			</div>
		</div>
		<input class="button-primary" type="submit" value="Submit">
	</form>
</div>
