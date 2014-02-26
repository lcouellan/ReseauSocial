<?php
	session_start();
	$_SESSION['page'] = 'inscription';
	header('Location: ../');
?>