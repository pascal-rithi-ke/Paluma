<?php

$bdd = new PDO('mysql:host=localhost;dbname=paluma;charset=utf8','root','');
echo 'Historique de Commande '/*$_SESSION['pseudo']*/;
// requête affichage historiue commande
$requete=$bdd->query("SELECT `produit`.`nom` as nom,commande.prix as prix,`commande`.`quantite`,commande.prixTotal,`date` FROM `commande` JOIN `produit` ON `commande`.`idProduit` = `produit`.`id`");
?>
<br><br><a href="index.php"><input type="button" value="Retour"/></a><hr>
<b><?php while($bdd=$requete->fetch()) {
//affiche les données de la requete
echo 'Nom : '.$bdd['nom'].'<br>'.'Quantité : '.$bdd['quantite'].'<br>'.'Prix : '.$bdd['prix'].'€'.'<br>'.'Date :'.$bdd['date'].'<br>'.'Prix Final : '.$bdd['prixTotal'].'€'.'<hr>';
}
?></b>