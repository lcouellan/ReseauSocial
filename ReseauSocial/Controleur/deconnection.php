<?php
	session_start();
	$nom_page = $_SESSION["page"];
	$langue = $_SESSION["lang"];
	
	$_SESSION = array();
	$_SESSION["lang"] = $langue;
	$_SESSION["page"] = "connexion";
	header('Location: ../');
?>