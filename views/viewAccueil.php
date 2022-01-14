<div class="produits-container">
    <?php
    // utilisé comme nom "$produits" car il est nommé ainsi dans ControllerAccueil.php dans la fonction produits()
    foreach($produits as $produit): ?>
        <div class="produit-disp">
            <h2><?=$produit->nom()." - ".$produit->prix()."€"?></h2>
            <p><?=$produit->type()?></p>
            <div class="img-container">
                <img src=<?="'".$produit->img()."'";?>/>
            </div>
            <a class="bouton" href="/Test">Test</a>
        </div>
    <?php endforeach;
    ?>
</div>