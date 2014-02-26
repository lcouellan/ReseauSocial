<?php 
	require_once('connexion_sql.php');
	
	if(isset($_SESSION['identifiant'])){
		$requete = $bdd->prepare("select UTILISATEUR_MAIL from utilisateur where UTILISATEUR_MAIL=?");
		$requete->execute(array($_SESSION['identifiant']));
		$resultat = $requete->fetchAll();
		
		if(!empty($resultat)){
			if($_SESSION['page'] == 'Connexion')
				$_SESSION['page'] = 'Accueil';
			$connect = true;
		}
		else{
			
			if($_SESSION['page'] != 'Inscription' && $_SESSION['page'] != 'Connexion'){
				$_SESSION['page'] = 'Connexion';
			}
			$connect = false;
		}
	}
	else{
		if($_SESSION['page'] != 'Inscription'){
			$_SESSION['page'] = 'Connexion';
		}
		$connect = false;
	}