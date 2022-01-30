<?php
include_once("Model.php");
class Personne {
/*********************
ATTRIBUTS
*********************/
  private $Nom;
  private $Prenom;
  private $Sexe;
  private $Telephone;

  /**********************
METHODES
**********************/
//Constructeur
  public function __construct($nom,$prenom,$sexe,$telephone){
    $this->Nom=$nom;
    $this->Prenom=$prenom;
    $this->Sexe=$sexe;
    $this->Telephone=$telephone;
  }

  //setters
  public function Set_Nom($nom){
    $this->Nom=$nom;
  }

  public function Set_Prenom($prenom){
    $this->Prenom=$prenom;
  }

  public function Set_Sexe($sexe){
    $this->Sexe=$sexe;
  }

  public function Set_Telephone($telephone){
    $this->Telephone=$telephone;
  }

  //getters

  public function Get_Nom(){
    return $this->Nom;
  }

  public function Get_Prenom(){
     return $this->Prenom;
  }

  public function Get_Sexe(){
     return $this->Sexe;
  }

  public function Get_Telephone(){
     return $this->Telephone;
  }

  //Ajout d'une personne dans la base de données
  public function Ajouter(){
    $unebase=new C_based();
    $requete = "INSERT INTO personne (nom, prenom, sexe,telephone)VALUES (:nom,:prenom,:sexe, :telephone)";
    $donnees =array(
      "nom" => $this->Nom,
      "prenom" => $this->Prenom,
      "sexe" => $this->Sexe,
      "telephone" => $this->Telephone
    );

    $unebase->set_enregistrement($requete, $donnees);
    $unebase->Close();
  }

  //Modifier les attributs d'une personne
  public function Modifier($id){
    $unebase=new C_based();
    $requete = "UPDATE personne SET nom=:nom, prenom= :prenom, sexe=:sexe,telephone=:telephone WHERE idPersonne = :id";
    $donnees =array(
      "nom" => $this->Nom,
      "prenom" => $this->Prenom,
      "sexe" => $this->Sexe,
      "telephone" => $this->Telephone,
      "id" => $id
    );

    $unebase->set_enregistrement($requete, $donnees);
    $unebase->Close();
  }

  //Supprimer une personne de la base de données
  public function Supprimer($id){
    $unebase=new C_based();
    $unebase->set_requete("DELETE FROM `personne` WHERE idPersonne =$id");
    $unebase->Close();
  }

  public function recuperer_id(){
    $unebase=new C_based();
    $requete = "SELECT * FROM personne ORDER BY idPersonne DESC LIMIT 1";
    $unebase->set_requete($requete);
    $resultat = $unebase->get_resultat();
    $ligne = $resultat->fetch(PDO::FETCH_OBJ);
    $idMax = $ligne->idPersonne;
    return $idMax;
    }

}

