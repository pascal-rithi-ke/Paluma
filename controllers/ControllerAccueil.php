<?php
class ControllerAccueil{
    private $_produitManager;
    private $_view;

    public function __construct($url){
        if (isset($url) && count((array)$url) > 1){
            throw new Exception("Page introuvable");
        }
        else{
            // appel la fonction produits() qui récupère la classe produitManager qui hérite de la classe Model.
            $this->produits();
        }   
    }
            // Elle va crée un nouvel object grâce à la classe produitManager avec les paramètres passées.
            // Puis effectue la requête getProduits() et les insérent dans le nouvel object.
            // Ici La mise en forme se fait à partir de "viewAccueil.php"

    private function produits(){
        $this->_produitManager = new produitManager;
        $produits = $this->_produitManager->getProduits();
        require_once('views/viewAccueil.php');
    }
/*
    private function commandes(){
        $this->_commandeManager = new commandeManager;
        $commandes = $this->_commandeManager->getHistorique();
        require_once('views/viewAccueil.php');
    }
}
*/
}