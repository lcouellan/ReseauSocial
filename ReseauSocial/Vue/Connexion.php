<center>
	<article class="connect_left">
		<h1>Connexion</h1>
		<form action="Controleur/form_connexion.php" method="POST">
			<label for="login">Pseudo : </label>
			<input name="pseudo" id="login" type="email" required /><br/><br/>
									
			<label for="pass">Mot de passe : </label>
			<input name="passC" id="pass" type="password" required /><br/><br/>
									
			<input name="validConnect" type="submit"/>
		</form>
		<a href='Controleur_page.php?page=Inscription'>S'inscrire</a>
		<?php if(isset($_SESSION['erreur_saisi_vide']) && $_SESSION['erreur_saisi_vide']){?>
			<p>Vous n'avez pas rempli tous les champs obligatoires.</p>
		<?php }else if(isset($_SESSION['erreur_saisi']) && $_SESSION['erreur_saisi']){?>
			<p>Erreur de login ou mot de passe.</p>
		<?php }?>
	</article>
					
	<article class="connect_right">
		<img src="Images/chat.jpg" alt="Image" />
	</article>
</center>