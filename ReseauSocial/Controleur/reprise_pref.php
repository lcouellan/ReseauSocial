<?php
session_start();
$_SESSION['nom'] = $_POST['nom'];
$_SESSION['mail'] = $_POST['mail'];
$_SESSION['mdp'] = $_POST['mdp'];
$_SESSION['reseau'] = $_POST['reseau'];
$_SESSION['langue'] = $_POST['langue'];
$nom="test";
$mail="test@test.com";
$reseau="test";
$langue="test";
if(!isset($_POST['nom'])){
	
	$nom = $_POST['nom'];
}
if(!isset($_POST['mail'])){
	
	$mail = $_POST['mail'];
}
if(!isset($_POST['mdp'])){
	$mdp="troll";
	$mdp = $_POST['mdp'];
}
if(!isset($_POST['reseau'])){
	
	$reseau = $_POST['reseau'];
}
if(!isset($_POST['langue'])){

	$langue = $_POST['langue'];
}




?>