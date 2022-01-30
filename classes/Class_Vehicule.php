<?php
include_once("Model.php");
class Vehicule
{
    /*********************
ATTRIBUTS
     *********************/
    private $Immatricule;
    private $Marque;
    private $Couleur;


    /**********************
METHODES
     **********************/
    //Constructeur
    public function __construct($immatricule, $marque, $couleur)
    {
        $this->Immatricule = $immatricule;
        $this->Marque = $marque;
        $this->Couleur = $couleur;
    }

    //setters
    public function Set_Immatricule($immatricule)
    {
        $this->Immatricule = $immatricule;
    }

    public function Set_Marque($marque)
    {
        $this->Marque = $marque;
    }

    public function Set_Couleur($couleur)
    {
        $this->Couleur = $couleur;
    }

    //getters

    public function Get_Immatricule()
    {
        return $this->Immatricule;
    }

    public function Get_Marque()
    {
        return $this->Marque;
    }

    public function Get_Couleur()
    {
        return $this->Couleur;
    }

    //Ajout d'une personne dans la base de données
    public function Ajouter()
    {
        $unebase = new C_based();
        $requete = "INSERT INTO vehicule (immatriculation, marque, couleur)VALUES (:immatriculation,:marque,:couleur)";
        $donnees = array(
            "immatriculation" => $this->Immatricule,
            "marque" => $this->Marque,
            "couleur" => $this->Couleur,
        );

        $unebase->set_enregistrement($requete, $donnees);
        $unebase->Close();
    }

    //Afficher tous les utilisateur se trouvant dans la base de donn�es
    public static function Afficher()
    {
        $unebase = new C_based();
        $unebase->set_requete("SELECT * FROM vehicule");
        $table = $unebase->get_resultat();
        $unebase->Close();
        return $table;
    }

    //Modifier les attributs d'une vehicule
    public function Modifier($id)
    {
        $unebase = new C_based();
        $requete = "UPDATE vehicule SET immatriculation=:immatriculation, marque= :marque, couleur=:couleur WHERE idVehicule = :id";
        $donnees = array(
            "immatriculation" => $this->Immatricule,
            "marque" => $this->Marque,
            "couleur" => $this->Couleur,
            "id" => $id
        );

        $unebase->set_enregistrement($requete, $donnees);
        $unebase->Close();
    }

    //Supprimer une vehicule de la base de données
    public function Supprimer($id)
    {
        $unebase = new C_based();
        $unebase->set_requete("DELETE FROM `vehicule` WHERE idVehicule =$id");
        $unebase->Close();
    }

    public function recuperer_id()
    {
        $unebase = new C_based();
        $requete = "SELECT * FROM vehicule ORDER BY idVehicule DESC LIMIT 1";
        $unebase->set_requete($requete);
        $resultat = $unebase->get_resultat();
        $ligne = $resultat->fetch(PDO::FETCH_OBJ);
        $idMax = $ligne->idVehicule;
        return $idMax;
    }

    //Afficher tous les utilisateur se trouvant dans la base de donn�es
    public static function AfficherUnique($id)
    {
        $unebase = new C_based();
        $unebase->set_requete("SELECT * FROM vehicule WHERE idVehicule = $id");
        $table = $unebase->get_resultat();
        $ligne = $table->fetch(PDO::FETCH_OBJ);
        $unebase->Close();

        $unebase->Close();
        return $ligne;
    }
}
