<?php
	
	//Connexion à la base de donnée MySQL
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=reseau_social','root','');
	}catch(Exception $e){
		die('Erreur : '.$e->getMessage());
	}
	
?>