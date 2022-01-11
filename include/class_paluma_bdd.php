<?php

class PDOPaluma{
    private static $server = 'mysql:host=localhost'; 
    private static $bdd = 'dbname=paluma';  		
	private static $user = 'root';    		
	private static $mdp = '';	
 	private static $monPdo;
 	private static $monPDOPaluma=null;

    public function __construct(){
    	PDOPaluma::$monPdo = new PDO(PDOPaluma::$server.';'.PDOPaluma::$bdd,PDOPaluma::$user,PDOPaluma::$mdp); 
		//var_dump(PDOPaluma::$monPdo);
		PDOPaluma::$monPdo->query("SET CHARACTER SET utf8");
	}
	public function _destruct(){
		PDOPaluma::$monPdo = null;
	}

    public static function getPDOPaluma(){
    
        if(PDOPaluma::$monPDOPaluma==null){
                PDOPaluma::$monPDOPaluma= new PDOPaluma();
                //echo "Connected successfully";
            }else{
                echo"Problem to Connect";
            }
        return PDOPaluma::$monPDOPaluma;
        }

/* [ Fonction rêquete base de donnée ] */

    public static function getListe(){
		$req = "SELECT * FROM `produit`";
		$res = PDOPaluma::$monPdo->query($req);
		$ligne = $res->fetch();
		var_dump($ligne);
	}

}
?>