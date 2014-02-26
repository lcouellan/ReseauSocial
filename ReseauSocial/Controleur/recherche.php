<?php
	include("Controleur/connexion_sql.php");
	if(!empty($_POST['recherche'])){
	$req = $bdd->query("select * from utilisateur where utilisateur_prenom like '%".$_POST['recherche']."%' order by utilisateur_nom");
	$req2 = $bdd->query("select * from utilisateur where utilisateur_nom like '%".$_POST['recherche']."%' order by utilisateur_nom");
	$res = $req->fetchAll();
	$res2 = $req2->fetchAll();
	if(empty($res) and empty($res2))
	{
	echo "<tr><td colspan=\"3\">Pas de réponse pour ".$_POST['recherche']."</td></tr>";
	}
	else if(!empty($res))
	{
	for($i = 0; $i < count($res);$i++)
		echo "<tr><td>".$res[$i]['UTILISATEUR_NOM']."</td><td>".$res[$i]['UTILISATEUR_PRENOM']."</td><td>".$res[$i]['UTILISATEUR_MAIL']."</td></tr>";
	}
	else if(!empty($res2))
	{
	for($i = 0; $i < count($res2);$i++)
		echo "<tr><td>".$res2[$i]['UTILISATEUR_NOM']."</td><td>".$res2[$i]['UTILISATEUR_PRENOM']."</td><td>".$res2[$i]['UTILISATEUR_MAIL']."</td></tr>";
	}
}
else
	{
	echo "<tr><td colspan=\"3\">Pas de résultat</td></tr>";
	}
?>