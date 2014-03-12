<center>
	<article class='connect_left'>
		<h1><?php echo $inscription;?></h1>
		<?php if(isset($_POST['validInscri']) && isset($erreur_vide)){ ?>
			<div>Tout les champs sont obligatoire ou n'as pas etait bien saisi!</div>
		<?php }
		else if(isset($_POST['validInscri']) && isset($erreur_mail)){?>
			<div>Cette adresse mail est déja enregistré!</div>
		<?php }
		else if(isset($_POST['validInscri']) && isset($erreur_pass)){?>
			<div>Le mot de passe n'est pas valide il doit comporter :</br> Majuscule, Minuscule et chiffre</div>
		<?php }
		else if(isset($_POST['validInscri']) && isset($erreur_nom)){?>
			<div>Le nom ou le prenom n'est pas conforme!</div>
		<?php }
		
		if(isset($good_connct) && $good_connct){?>
			<div>Votre inscription a bien était pris en compte.</div>
		<?php }else{?>
			<form action="" method="POST">
				<input name="prenom" type="text" placeholder="<?php echo $prenom;?>" required />
				<input name="nom" type="text" placeholder="<?php echo $nom;?>" required /><br/><br/>
				<input name="mail" type="email" placeholder="<?php echo $mail;?>" required /><br/><br/>
				<input name="passI" type="password" placeholder="<?php echo $motDePasse;?>" required /><br/><br/>
													
				<input name="validInscri" type="submit" value="<?php echo $envoyer;?>"/>
			</form>
		<?php }?>
	</article>
					
	<article class="connect_right">
		<img src="Images/chat.jpg" alt="Image" />
		<a href="Controleur_page.php?page=Connexion"><?php echo $connexion;?></a>
	</article>
</center>