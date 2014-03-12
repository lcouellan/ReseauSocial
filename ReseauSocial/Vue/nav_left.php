<nav class="nav_left">
	<ul> 
		<img src="../Images/anais.jpg" alt="" />
		<h2><?php echo $profil;?></h2>
			<li><a href="Controleur_page.php?page=Preference" ><?php echo $consulterProfil;?></a></li>
			<li><a href="#" ><?php echo $modifPhoto;?></a></li>  <br/>
		<h2><?php echo $reseau;?></h2>
			<li><a href="#"><?php echo $consulterReseaux;?></a></li> 
			<li><a href="Controleur_page.php?page=Reseau"><?php echo $mesReseaux;?></a> <?php include("Utils/fonc_php.php"); echo "(".getNbReseau().")";?></li> 
			<li><form action="" method="POST"><label for="rechercheR"><?php echo $rechercheReseau;?> : </label><input type="search" name="rechercheR" id="rechercheR"/></form></li><br/>

		<h2><?php echo $signal;?></h2>
			<li><a href="Controleur_page.php?page=poke"><?php echo $envoiSignal;?></a></li> 
		<h2></h2>
	</ul>
</nav>