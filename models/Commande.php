<?php

class Commande{
    private $_id;
    private $_idProduit;
    private $_quantite;
    private $_prix;
    private $_prixTotal;

    // Constructeur
    public function __construct(array $data){
        $this->hydrate($data);
    }

    // Hydratation permet de instancier l'objet, le remplir avec les champs issus de la base de données
    //puis appeler le constructeur.

    public function hydrate(array $data){
         // la boucle va permet de récupérer le nom de setter et voir s'ils existent
        foreach($data as $key => $value){
            $method = 'set'.ucfirst($key);
            if(method_exists($this, $method)){
                $this->$method($value);
                }
            }
    }

    // SETTER permet de vérifier avant de stocker la valeur 
    public function setId($id){
        $id = (int) $id;
        if ($id > 0){
            $this->_id = $id;
        }
    }
    public function setIdProduit($idProduit){
        $idProduit = (int) $idProduit;
        if ($idProduit > 0){
            $this->_idProduit = $idProduit;
        }
    }
    public function setPrix($prix){
        $prix = (float) $prix;
        if ($prix > 0){
            $this->_prix = $prix;
        }
    }
    public function setQuantite($quantite){
        $quantite = (int) $quantite;
        if ($quantite > 0){
            $this->_quantite = $idProduit;
        }
    }
    public function setPrixTotal($prixTotal){
        $prixTotal = (float) $prixTotal;
        if($prixTotal > 0){
            $this->_prixTotal = $prixTotal;
        }
    }

    // GETTER permet de renvoyer la/les valeurs(s)
    public function id(){
        return $this->_id;
    }
    public function idProduit(){
        return $this->_nom;
    }
    public function prix(){
        return $this->_prix;
    }
    public function quantite(){
        return $this->_quantite;
    }
    public function prixTotal(){
        return $this->_prixTotal;
    }
}