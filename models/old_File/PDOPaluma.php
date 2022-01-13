<?php

namespace include;

use App\Entity\Commande;


class PDOPaluma{
    private  $server = 'mysql:host=localhost';
    private  $bdd = 'dbname=paluma';
	private  $user = 'root';
	private  $mdp = '';
 	private  $monPdo;
 	private  $monPDOPaluma=null;

    public function __construct(){
    	$this->monPdo = new \PDO($this->server.';'.$this->bdd,$this->user,$this->mdp);
		//var_dump(PDOPaluma::$monPdo);
		$this->monPdo->query("SET CHARACTER SET utf8");
	}



	public function _destruct(){
		$this->$monPdo = null;
	}

    public function getPDOPaluma()
	{

        if($this->monPDOPaluma==null){
			$this->monPDOPaluma= new PDOPaluma();
                //echo "Connected successfully";
            }else{
                echo"Problem to Connect";
            }
        return $this->monPDOPaluma;
    }

/* [ Fonction rêquete base de donnée ] */

    public function getListe(){
		$req = "SELECT * FROM `produit`";
		foreach ($this->monPdo->query($req) as $resultat) {
			echo $resultat["id"].' '.$resultat["nom_produit"]."<br>";
		 }
	}

    public function addPanier(){
		$article = new Commande($_POST);

		$req = "INSERT INTO commande (id_produit, id_visiteur)
		VALUES (:id_produit, :id_visiteur)";
            $prepare = $this->monPdo->prepare($statementArt);
            $prepare->execute($article());
	}

	public function index()
    {
        $statement = "SELECT * FROM commande";
		foreach ($this->monPdo->query($statement) as $resultat) {
			echo $resultat["id"];
		 }
    }


}
?>