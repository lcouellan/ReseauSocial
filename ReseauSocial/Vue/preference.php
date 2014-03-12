<center>
	<article class="connect_left">
		<h1>Préférences</h1>
		<form action="./" method="POST">
			<label name="etiquette_prenom">Prénom</label>
			<input name="prenom" type="text" value="<?php  echo getPrenom(); ?>" placeholder="Nom"/><br>
			<label name="etiquette_nom">Nom</label>
			<input name="nom" type="text" value="<?php  echo getNom(); ?>" placeholder="Prénom"/><br>
			<label name="Adresse électronique">Adresse électronique</label>
			<input name="mail" type="email" value="<?php  echo getMail(); ?>" placeholder="Adresse mail"/><br>
			<label name="mot de passe">Confirmer le mot de passe actuel</label>
			<input name="mdpconfirm" type="password" /><br>
			<label name="mot de passe">Nouveau Mot de passe</label>
			<input name="newmdp" type="password" /><br>
			<label name="reseau principal">Réseau Principal</label>
			<select name="reseaux">
			<?php
				include("Controleur/connexion_sql.php");
				$req=$bdd->query("SELECT * FROM reseau");
				$res=$req->fetchAll();
				for($i=0; $i < count($res) ; $i++)
					echo "<option value=".$res[$i]['ID_RESEAU'].">".$res[$i]["LIBELLE"]."</option>";
				
			?>
			</select>
			<br/>
			<input name="modifier" type="submit" value="modifier"/>
		</form>
	</article>
</center>