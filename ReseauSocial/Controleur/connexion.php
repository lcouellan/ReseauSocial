<?php
	session_start();
	$_SESSION['page'] = 'connexion';
	header('Location: ../');
?>