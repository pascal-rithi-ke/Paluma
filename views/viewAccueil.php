<?php
// utilisé comme nom "$produits" car il est nommé ainsi dans ControllerAccueil.php dans la fonction produits()
foreach($produits as $produit): ?>
<h2><?=$produit->nom()." - ".$produit->prix()."€"?></h2>
<p><?=$produit->type()?></p>
<img src=<?="'".$produit->img()."'";?>/>
<a href="/Test">Test</a>
<hr>
<?php endforeach;
?>