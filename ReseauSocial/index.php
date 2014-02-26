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
	//$_SESSION['page'] = 'Connexion';
?>
<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr-fr" lang="fr-fr">
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="CSS/style.css" type="text/css" />
		<title>Réseau Social</title>
	</head>
	<body>
		<?php require_once('Vue/header.php'); 
		if($_SESSION['page'] != 'Connexion' && $_SESSION['page'] != 'Inscription')
			require_once('Vue/nav_left.php');
		?>
		<div id="bloc_fond">
			<section>
			<?php
				if(isset($_POST['recherche']))
					$_SESSION['page'] = "recherche";
				if(isset($_SESSION['page'])){
					switch($_SESSION['page']){
						case 'Accueil':{
							require_once("Vue/Accueil.php");
						}
						break;
						case 'Preference':{
							require_once("Vue/preference.php");
						}
						break;
						case 'Connexion':{
							require_once("Vue/Connexion.php");
						}
						break;
						case 'Inscription':{
							if(isset($_POST['validInscri'])){
								require_once('Controleur/inscription.php');
							}
							require_once("Vue/Inscription.php");
						}
						break;
						case 'recherche':{
							require_once("Vue/recherche.php");
						}
						break;
						case 'Reseau' :{
							require_once("Vue/reseau.php");
						}
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
				} ?>
			</section>
			<?php require_once('Vue/footer.php'); ?>
		</div>
	</body>
</html>