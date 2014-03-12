<?php
session_start();
global $id = getID();
$_SESSION['prenom'] = $_POST['prenom'];
$_SESSION['nom'] = $_POST['nom'];
$_SESSION['mail'] = $_POST['mail'];
$_SESSION['mdp'] = $_POST['mdp'];
$_SESSION['reseau'] = $_POST['reseau'];

if(!isset($_POST['nom'])){	
	$prenom = $_POST['prenom'];
	setPrenom($prenom,$id);
}

if(!isset($_POST['nom'])){	
	$nom = $_POST['nom'];
	setNom($nom,$id);
}
if(!isset($_POST['mail'])){
	$mail = $_POST['mail'];
	setMail($mail,$id);
}
if(!isset($_POST['mdp'])){
	$mdp = $_POST['mdp'];
}
if(!isset($_POST['reseau'])){
	$reseau = $_POST['reseau'];
	setReseau($reseau,$id);
}





?>