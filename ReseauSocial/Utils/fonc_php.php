<?php
include_once("Controleur/connexion_sql.php");
function getID(){
	global $bdd;
	$req = $bdd->query("select utilisateur_id from utilisateur where utilisateur_mail = '".$_SESSION['identifiant']."'");
	$res = $req->fetch();
	return $res[0];
}
function getNom(){
	global $bdd;
	$req = $bdd->query("select utilisateur_nom from utilisateur where utilisateur_mail = '".$_SESSION['identifiant']."'");
	$res = $req->fetch();
	return $res[0];
}

function getPrenom(){
	global $bdd;
	$req = $bdd->query("select utilisateur_prenom from utilisateur where utilisateur_mail = '".$_SESSION['identifiant']."'");
	$res = $req->fetch();
	return $res[0];
}

function getMail(){
	global $bdd;
	$req = $bdd->query("select utilisateur_mail from utilisateur where utilisateur_mail = '".$_SESSION['identifiant']."'");
	$res = $req->fetch();
	return $res[0];
}

function getMdp(){
	global $bdd;
	$req = $bdd->query("select utilisateur_mdp from utilisateur where utilisateur_mail = '".$_SESSION['identifiant']."'");
	$res = $req->fetch();
	return $res[0];
}

function getReseau(){
	global $bdd;
	$req = $bdd->query("SELECT libelle FROM reseau JOIN appartenirreseau USING ( id_reseau ) JOIN utilisateur USING ( utilisateur_id ) WHERE utilisateur_mail =  '".$_SESSION['identifiant']."';");
	$res = $req->fetch();
	return $res[0];
}

function getNbReseau(){
	global $bdd;
	$req = $bdd->query("SELECT count(*) FROM reseau JOIN appartenirreseau USING ( id_reseau ) JOIN utilisateur USING ( utilisateur_id ) WHERE utilisateur_mail =  '".$_SESSION['identifiant']."';");
	$res = $req->fetch();
	return $res[0];
}
function setPrenom($id,$prenom){
	global $bdd;
	$req=$bdd->query("UPDATE  `reseau_social`.`utilisateur` SET  `UTILISATEUR_PRENOM` =  '".$prenom."' WHERE  `utilisateur`.`UTILISATEUR_ID` =".$id.";");
}
function setNom($id,$nom){
	global $bdd;
	$req=$bdd->query("UPDATE  `reseau_social`.`utilisateur` SET  `UTILISATEUR_NOM` =  '".$nom."' WHERE  `utilisateur`.`UTILISATEUR_ID` =".$id.";");
}
function setMail($id,$mail){
	global $bdd;
	$req=$bdd->query("UPDATE  `reseau_social`.`utilisateur` SET  `UTILISATEUR_MAIL` =  '".$mail."' WHERE  `utilisateur`.`UTILISATEUR_ID` =".$id.";");
}

?>