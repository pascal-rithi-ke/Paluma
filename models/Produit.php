<?php

class Produit{
    private $_id;
    private $_nom;
    private $_prix;
    private $_type;
    private $_img;

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
    public function setNom($nom){
        if(is_string($nom)){
            $this->_nom = $nom;
        }
    }
    public function setPrix($prix){
        $prix = (float) $prix;
        if ($prix > 0){
            $this->_prix = $prix;
        }
    }
    public function setType($type){
        if(is_string($type)){
        $this->_type = $type;
        }
    }
    public function setImg($img){
        if(is_string($img)){
        $this->_img = $img;
        }
    }

    // GETTER permet de renvoyer la/les valeurs(s)
    public function id(){
        return $this->_id;
    }
    public function nom(){
        return $this->_nom;
    }
    public function prix(){
        return $this->_prix;
    }
    public function type(){
        return $this->_type;
    }
    public function img(){
        return $this->_img;
    }
}