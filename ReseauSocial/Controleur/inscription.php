<?php
	if(isset($_POST['validInscri'])){
		if(empty($_POST['prenom']) || empty($_POST['nom']) || empty($_POST['mail']) || empty($_POST['passI'])){
			$erreur_vide = true;
		}
		else{
			$req = $bdd->prepare("select UTILISATEUR_MAIL from utilisateur where UTILISATEUR_MAIL=?");
			$req->execute(array($_POST['mail']));
			$resultat_mail = $req->fetchAll();
			if(!empty($resultat)){
				$erreur_mail = true;
			}
			
			if(!preg_match('#^[A-Za-z0-9]{4,12}$#',$_POST['passI']))
			{
				$erreur_pass = true;
			}
			
			if(!preg_match('#^[A-Za-z0-9]+([\s-]?[A-Z0-9a-z]+)*$#',$_POST['nom']))
			{
				$erreur_nom = true;
			}
			
			if(!preg_match('#^[A-Za-z0-9]+([\s-]?[A-Z0-9a-z]+)*$#',$_POST['prenom']))
			{
				$erreur_nom = true;
			}
			
			if(!preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#',$_POST['mail']))
			{
				$erreur_mail = true;
			}
			
			if(isset($erreur_mail) || isset($erreur_pass) || isset($erreur_nom) || isset($erreur_mail)){
				$good_connct = false;
			}
			else{
				$good_connct = true;
				
				$passI = sha1($_POST['passI']);
				$req_good = $bdd->prepare('insert into utilisateur(UTILISATEUR_PRENOM, UTILISATEUR_NOM, UTILISATEUR_MAIL, UTILISATEUR_MDP, ESTMODERATEUR) values ( :prenom, :nom, :mail, :pass, :mod)');
				$req_good->execute(array(
					'prenom' => $_POST['prenom'],
					'nom' => $_POST['nom'],
					'mail' => $_POST['mail'],
					'pass' => $passI, 
					'mod' => "0"
					));
			}
		}
	}
	
	