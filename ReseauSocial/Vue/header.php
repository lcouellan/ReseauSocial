<header>
	<nav>
		<ul> 
			<li><a href="#" title="Social network"><div class="logo"></div></a></li>
			<?php if($connect){?>
				<li><form action="" method="POST"><input type="search" name="recherche" id='recherche'/><input class="logoRecherche" type="image" src="Images/recherche.png" name="recherche"/></form></li>
				<div class="afficheBar">
					<li><a href="./"><?php echo $accueil; ?></a></li> 
					<li><a href="Controleur_page.php?page=Deconnexion"><?php echo $deconnexion; ?></a></li> 
				</div>
			<?php }?>
		</ul>
	</nav>
</header>