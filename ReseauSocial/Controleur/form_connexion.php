<?php
	session_start();
	require_once("connexion_sql.php");
	if(!isset($_POST['pseudo']) || !isset($_POST['passC'])){
		$_SESSION['erreur_saisi'] = true;
		$_SESSION['erreur_saisi_vide'] = false;
	}
	else{
		if(empty($_POST['pseudo']) || empty($_POST['passC'])){
			$_SESSION['erreur_saisi_vide'] = true;
			$_SESSION['erreur_saisi'] = false;
		}
		else{
			$pass = sha1($_POST['passC']);
			$requete_connect = $bdd->prepare("select UTILISATEUR_MAIL from utilisateur where UTILISATEUR_MAIL=? and UTILISATEUR_MDP=?");
			$requete_connect->execute(array($_POST['pseudo'], $pass));
			$resultat_connect = $requete_connect->fetchAll();
			if(empty($resultat_connect)){
				$_SESSION['erreur_saisi_vide'] = false;
				$_SESSION['erreur_saisi'] = true;
			}
			else{
				$_SESSION['identifiant'] = $_POST['pseudo'];
				$_SESSION['erreur_saisi_vide'] = false;
				$_SESSION['erreur_saisi'] = false;
			}
		}
	}
	header("Location: ../");
?>