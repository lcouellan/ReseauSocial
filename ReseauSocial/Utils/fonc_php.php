<?php
include("connexion_sql.php");
function getNom(){
	global $bdd;
	$req = $bdd->query("select utilisateur_nom from utilisateur where utilisateur_id = ".$_SESSION['utilisateur_id']."");
	$res = $req->fetch();
	return $res;
}

function getPrenom(){
	global $bdd;
	$req = $bdd->query("select utilisateur_prenom from utilisateur where utilisateur_id = ".$_SESSION['utilisateur_id']."");
	$res = $req->fetch();
	return $res;
}

function getMail(){
	global $bdd;
	$req = $bdd->query("select utilisateur_mail from utilisateur where utilisateur_id = ".$_SESSION['utilisateur_id']."");
	$res = $req->fetch();
	return $res;
}

function getMdp(){
	global $bdd;
	$req = $bdd->query("select utilisateur_mdp from utilisateur where utilisateur_id = ".$_SESSION['utilisateur_id']."");
	$res = $req->fetch();
	return $res;
}

function getReseau(){
	global $bdd;
	$req = $bdd->query("select libelle from reseau join appartenir_reseau using(id_reseau) where utilisateur_id = ".$_SESSION['utilisateur_id']."");
	$res = $req->fetch();
	return $res;
}

?>