<?php
include_once("C_based.php");
//include_once("../../configuration/myconfig.inc.php");
class Session{
	private $Id;
	private $Time;
	private $User;
	private $Profil;
	
	public function __construct($unid,$unetime,$unuser,$unprofil){
		$this->Id=$unid;
		$this->Time=$unetime;
		$this->User=$unuser;
		$this->Profil=$unprofil;
	}
	public function Ajouter(){
		$unebase=new C_based(MYHOST,MYUSER,MYPASS);
		$unebase->set_db(MYDATABASE);
		//$theValue=$this->Nom;
		//$this->Nom = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;
		$unebase->set_requete("INSERT INTO session VALUES ('$this->Id', '$this->Time', '$this->User', '$this->Profil')");
		$unebase->Close();
	}
	public function Set_Id($identifiant){
		$this->Id=$identifiant;
	}
	public function Get_Id(){
		return $this->Id;
	}
	public function Set_Time($valeur){
		$this->Time=$valeur;
	}
	public function Set_user($valeur){
		$this->User=$valeur;
	}
	public function Set_Profil($valeur){
		$this->Profil=$valeur;
	}
	public function Modifier(){
		$unebase=new C_based(MYHOST,MYUSER,MYPASS);
		$unebase->set_db(MYDATABASE);
		$unebase->set_requete("UPDATE session SET Profil='$this->Profil', Time='$this->Time', User='$this->User' WHERE session.ID =$this->Id");
		$unebase->Close();
	}
	public function Supprimer(){
		$unebase=new C_based(MYHOST,MYUSER,MYPASS);
		$unebase->set_db(MYDATABASE);
		$unebase->set_requete("DELETE FROM `session` WHERE CONVERT(`session`.`id` USING utf8) = '$this->Id' "); 
		$unebase->Close();
	}
	public static function Afficher(){
		$unebase=new C_based(MYHOST,MYUSER,MYPASS);
		$unebase->set_db(MYDATABASE);
		$unebase->set_requete("SELECT * from session");
		$unebase->result_table();
		$unebase->Close();
	}
}
?>