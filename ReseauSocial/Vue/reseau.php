<table border=1>
<th>N°</th><th>Nom du réseau</th>
<?php 
include("Controleur/connexion_sql.php");
$req = $bdd->query("select * from reseau where id_reseau in ( select id_reseau from appartenirreseau join utilisateur using (utilisateur_id) where utilisateur_mail='".$_SESSION['identifiant']."');");
$res = $req->fetchAll();
for($i = 0; $i < count($res);$i++)
	echo "<tr><td>".$res[$i]['ID_RESEAU']."</td><td>".$res[$i]['LIBELLE']."</td></tr>";
?>
</table>