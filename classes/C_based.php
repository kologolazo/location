
<?php
/**************************************
Classe de gestion d'une base de donn�es
Version:0.1
***************************************/

	class C_based{

	/****************
	ATTRIBUTS
	*****************/
		/*public $host; //Nom de la machine hote
		private $user; //Login de connexion a la base
		private $passwd; //Mots de passe de connexion � la base
		private $nomdb; //Nom de la base de donn�es (data base name)*/
		private $idconnect; // identifiant de connexion
		private $idresult; // identifiant de r�sultat d'une requette
		//private $idbase; // identifiant de selection de la data base
		private $requete; // Requette sur la base de donn�s
		private $i;
	/****************
	METHODES
	****************/
	//Constructeur
		public function __construct(){
			$this->idconnect= new PDO('mysql:host=localhost; dbname=location_db','root','');
			//@mysql_connect($this->host,$this->user,$this->passwd);
			if(!$this->idconnect){
				echo "<script>alert('Erreur de connexion de la base de donn�es : pr�venir administrateur.');</script>\n";
			}
		}

		//Requette � executer
		public function set_requete($larequete){
			$this->requete=$larequete;
			$this->idresult=$this->idconnect->query($this->requete);
			if(!$this->idresult){
				echo "<script>alert('Erreur execution requette : pr�venir administrateur.$larequete');</script>\n";
			}
		}

		public function get_resultat(){
			return $this->idresult;
		}

	public function return_table(){
			//$nbcol=@mysql_num_fields($this->idresult);
			//$nbligne=@mysql_num_rows($this->idresult);
			$i=0;
			$j=0;
			$tableau=array();
			while($ligne=$this->idresult->fetch(PDO::FETCH_OBJ)){
				$i=$i+1;
				foreach($ligne as $valeur){
				$j=$j+1;
				//echo $valeur."<br/>";
				$tableau[$i][$j]=$valeur;
				//echo $tableau[$i][$j]."<br/>";
				}
			}
			return $tableau;
		}

		//Requette � executer
		public function set_enregistrement($larequete,$donnees){
			$this->requete= $larequete;
			$result = $this->idconnect->prepare($this->requete);
			$this->idresult= $result->execute($donnees);
			if(!$this->idresult){
				echo "<script>alert('Erreur execution requette : pr�venir administrateur.$larequete');</script>\n";
			}
		}

		public function Close(){
			$this->idconnect = null;
		}

	}
?>
