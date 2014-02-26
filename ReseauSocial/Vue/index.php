<?php 
	session_start();
	
	if(isset($_SESSION['lang'])){
		switch($_SESSION['lang']){
			case 'FR':{
				require_once("Controleur/Langues/FR.php");
			}
			break;
			
			case 'EN':{
				require_once("Controleur/Langues/EN.php");
			}
			break;
			
			case 'PO':{
				require_once("Controleur/Langues/PO.php");
			}
			break;
			
			default:{
				require_once("Controleur/Langues/FR.php");
				$_SESSION['lang'] = 'FR';
			}
			break;
		}
	}
	else{
		require_once("Controleur/Langues/FR.php");
		$_SESSION['lang'] = 'FR';
	}
	
	require_once("Controleur/verif_connexion.php");
	$_SESSION['page'] = 'Connexion';
	if(isset($_SESSION['page'])){
		switch($_SESSION['page']){
			case 'Accueil':{
				require_once("Vue/Accueil.php");
			}
			break;
			case 'Connexion':{
				require_once("Vue/Connexion.php");
			}
			break;
			case 'inscription':{
				if(isset($_POST['validInscri'])){
					require_once('Controleur/inscription.php');
				}
				require_once("Vue/Inscription.php");
			}
			break;
			default:{
				$_SESSION['page'] = 'Accueil';
				require_once("Vue/Accueil.php");
			}
			break;
		}
	}
	else{
		require_once("Vue/Accueil.php");
		$_SESSION['page'] = 'Accueil';
	}
	

?>