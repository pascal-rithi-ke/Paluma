<?php
class ProduitManager extends Model{
    // Stock dans une fontion et retourne la rêquete en précisant les paramètres de la rêquete (nom de la table, nom de l'object)
    public function getProduits(){
        return $this->getAll('produit','Produit');
    }
    
    public function getHistorique(){
        return $this->getAll('commande','Commande');
    }
}