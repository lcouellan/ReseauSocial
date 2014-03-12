<?php	
	session_start();
	if(isset($_GET['page'])){
		switch($_GET['page']){
			case 'FR':{
				$_SESSION['lang'] = 'FR';
				header('Location: ./');
			}
			break;
			case 'EN':{
				$_SESSION['lang'] = 'EN';
				header('Location: ./');
			}
			break;
			case 'PO':{
				$_SESSION['lang'] = 'PO';
				header('Location: ./');
			}
			break;
			case 'Accueil':{
				$_SESSION['page'] = 'Accueil';
				header('Location: ./');
			}
			break;
			case 'Preference':{
				$_SESSION['page'] = 'Preference';
				header('Location: ./');
			}
			break;
			case 'Connexion':{
				$_SESSION['page'] = 'Connexion';
				header('Location: ./');
			}
			break;
			case 'Inscription':{
				$_SESSION['page'] = 'Inscription';
				header('Location: ./');
			}
			break;
			case 'Reseau':{
				$_SESSION['page'] = 'Reseau';
				header('Location: ./');
			}
			break;
			case 'Deconnexion':{
				header('Location: Controleur/deconnection.php');
			}
			break;
			default:{
				$_SESSION['page'] = 'Accueil';
				header('Location: ./');
			}
			break;
		}
	}
	else{
		$_SESSION['page'] = 'Accueil';
		header('Location: ./');
	}
	
	
?>