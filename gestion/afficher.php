<div class="twelve columns">
	<h4 style="color:#009070">Membres Inscrits :</h4>
	<a class="button" href="gestion.php?ajouter">Ajouter</a>
	<table class="u-full-width">
		<thead>
			<tr>
				<th>Nom</th>
				<th>Email</th>
				<th>Description</th>
				<th>Editon</th>
			</tr>
		</thead>
		<tbody>
		<?php
			// Vérifier si connecté
			if(!empty($_SESSION['id'])){
		?>
			<tr style="color: #3077FF">
				<td><?php echo $_SESSION['name']; ?></td>
				<td><?php echo $_SESSION['email']; ?></td>
				<td><?php echo $_SESSION['description']; ?></td>
				<td>
					<a class="button" style="border-color:#008080;color:#008080" href="gestion.php?modifier&email=<?php echo $_SESSION['email']; ?>">Modifier</a>
				</td>
			</tr>
		<?php
		}
		?>
		<?php
			$req = $pdo->prepare("	SELECT name,email,description FROM user WHERE email != :email	");
			$req->bindParam(':email',$_SESSION['email']);
			$req->execute();
			while($ligne = $req->fetch()){	
		?>
			<tr>
				<td><?php echo $ligne['name']; ?></td>
				<td><?php echo $ligne['email']; ?></td>
				<td><?php echo $ligne['description']; ?></td>
				<td>
					<a class="button" style="border-color:#008080;color:#008080" href="gestion.php?modifier&email=<?php echo $ligne['email']; ?>">Modifier</a>
					<a class="button" style="border-color:#880000;color:#880000" href="gestion/delete.php?email=<?php echo $ligne['email']; ?>">Supprimer</a>
				</td>
			</tr>
		<?php
			}
		?>
		</tbody>
    </table>
</div>
