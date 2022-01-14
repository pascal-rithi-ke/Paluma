<?php

    abstract class Model{
        private static $_bdd;
        private static $mdp =""; /* ou $mdp="root" par défaut pour Mac*/

        // Instancie la connexion à la bdd
        private static function setBdd(){
        try{
            self::$_bdd = new PDO('mysql:host=localhost;dbname=paluma;charset=utf8','root',self::$mdp);
            self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        }catch(Exception $e){
                die("Erreur".$e->getMessage());
            }
        }

// Récupére la connexion à la bdd
        protected function getBdd(){
            if(self::$_bdd == null){
                self::setBdd();
            return self::$_bdd;
            }  
        }
        
// Requête afficher toutes les données d'une table
        protected function getAll($table, $obj){
            $var = [];
            $req = $this->getBdd()->prepare('SELECT * FROM ' .$table);
            $req->execute();
            while($data = $req->fetch(PDO::FETCH_ASSOC)){
                $var[] = new $obj($data);
                //var_dump($var);
            }
            return $var;
            $req->closeCursor();
        }
    }
?>