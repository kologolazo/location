<?php
include_once("C_based.php");
class Utilisateur{
/*********************
ATTRIBUTS
*********************/
	private $Login;
	private $MotPasse;
	private $Profil;
	private $Personne;
	private $MotHash;
/**********************
METHODES
**********************/
//Constructeur
	public function __construct($unlogin,$unmotpasse,$unprofil,$personne){
		$this->Login=$unlogin;
		$this->MotPasse=$unmotpasse;
		$this->Profil=$unprofil;
		$this->Personne=$personne;
		$this->MotHash = md5($this->MotPasse);
	}
//Ajout d'un utilisateur dans la base de données
	public function Ajouter(){
		$unebase=new C_based();
		$requete = "INSERT INTO user (idPersonne, idProfil, identifiant,password)VALUES (:personne,:profil,:login, :MotHash)";
		$donnees =array(
			"personne" => $this->Personne,
			"profil" => $this->Profil,
			"login" => $this->Login,
			"MotHash" => $this->MotHash
		);
		//$unebase->set_db(MYDATABASE);
		$unebase->set_enregistrement($requete, $donnees);
		$unebase->Close();
	}
//Modification d'un attribut de l'objet après sa construction
	public function Set_Login($identifiant){
		$this->Login=$identifiant;
	}
	public function Set_MotPasse($valeur){
		$this->MotPasse=$valeur;

		$this->MotHash = md5($this->MotPasse);

	}
	public function Set_MotHash($valeur){
		$this->MotHash=$valeur;

	}
	public function Set_Profil($valeur){
		$this->Profil=$valeur;
	}
	public function Set_Personne($valeur){
		$this->Personne=$valeur;
	}
//Modifier les attributs d'un utilisateur
	public function Modifier($id){
		$unebase=new C_based();
		$requete = "UPDATE user SET idPersonne=:personne, idProfil= :profil, identifiant=:login,password=:MotHash WHERE idUser = :id";
		$donnees =array(
			"personne" => $this->Personne,
			"profil" => $this->Profil,
			"login" => $this->Login,
			"MotHash" => $this->MotHash,
			"id" => $id
		);

		$unebase->set_enregistrement($requete, $donnees);
		$unebase->Close();
	}

	//Supprimer un utilisateur de la base de données
	public function Supprimer($id){
		$unebase=new C_based();
		$unebase->set_requete("DELETE FROM `user` WHERE idUser =$id");
		$unebase->Close();
	}
	//Afficher tous les utilisateur se trouvant dans la base de données
	public static function Afficher(){
		$unebase=new C_based();
		$unebase->set_requete("SELECT * FROM user u INNER JOIN personne p ON u.idPersonne= p.idPersonne INNER JOIN profil pr ON u.idProfil = pr.idProfil");
		$table = $unebase->get_resultat();
		$unebase->Close();
		return $table;
	}

	//AfficherUnique tous les utilisateur se trouvant dans la base de données
	public static function AfficherUnique($idUser){
		$unebase=new C_based();
		$unebase->set_requete("SELECT * FROM user u INNER JOIN personne p ON u.idPersonne= p.idPersonne INNER JOIN profil pr ON u.idProfil = pr.idProfil WHERE u.idUser=$idUser");
		$table = $unebase->get_resultat();
    $ligne = $table->fetch(PDO::FETCH_OBJ);
		$unebase->Close();
		return $ligne;
	}

	public function Login($id){
		//session_start();
		$user = $this::AfficherUnique($id);
		$_SESSION['idPersonne']=$user->idPersonne;
		$_SESSION['idProfil']=$user->idProfil;
		$_SESSION['identifiant']=$user->identifiant;

	}


	public function Is_User(){
		$unebase=new C_based();
		$query = "SELECT * FROM user  WHERE  user.identifiant='$this->Login' AND user.password ='$this->MotHash' ";
		$unebase->set_requete($query);

		$resultat = $unebase->get_resultat();
		$nb = $resultat->rowCount();
    //$ligne = $resultat->fetch(PDO::FETCH_OBJ);
    //$nb = $ligne->rowCount();
    //print_r($resultat);

		if($nb==1){
    	$ligne = $resultat->fetch(PDO::FETCH_OBJ);

			$exist[0]=$ligne->identifiant;
			$exist[1]=$ligne->idProfil;
			$exist[2]=$ligne->idPersonne;
			$exist[3]=$ligne->idUser;
		}
		else{
			$exist[0]='';
		};
	$unebase->Close();
	return $exist;
	}
}
?>
