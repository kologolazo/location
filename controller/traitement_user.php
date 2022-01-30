<?php
include_once('../classes/Model.php');
if (isset($_POST["submit"])) {
	$nom = $_POST["nom"];
	$prenom = $_POST["prenom"];
	$sexe = $_POST["sexe"];
	$telephone = $_POST["telephone"];
	$identifiant = $_POST["identifiant"];
	$idProfil = $_POST["idProfil"];
	$password = $_POST["password"];
	//echo $identifiant;
	$personne = new Personne($nom, $prenom, $sexe, $telephone);

	$personne->Ajouter();

	$idPersonne = $personne->recuperer_id();

	$user = new Utilisateur($identifiant,$password,$idProfil,$idPersonne);

	$user->Ajouter();

	echo '
		<div id="notif" style="background-color:#060">
		Données enregistrées avec succès!!
		<button type="button" onclick="getElementById(\'notif\').hide()" style="margin-left:75%;">
		<a href="../liste_user.php"> <spam >x</spam> </a>
		</button>
		</div>
	';

}

if (isset($_POST['modifier'])) {
	$nom = $_POST["nom"];
	$prenom = $_POST["prenom"];
	$sexe = $_POST["sexe"];
	$telephone = $_POST["telephone"];
	$identifiant = $_POST["identifiant"];
	$idProfil = $_POST["idProfil"];
	$password = $_POST["password"];

	$id = $_POST["idUser"];

	$user = Utilisateur::AfficherUnique($id);
	$idPersonne = $user->idPersonne;
	$modifierUser = new Utilisateur($identifiant,$password,$idProfil,$idPersonne);
	$modifierUser->Modifier($id);

	$modifiePersonne = new Personne($nom, $prenom, $sexe, $telephone);
	$modifiePersonne->Modifier($idPersonne);

	echo '
		<div id="notif" style="background-color:#060">
		Données enregistrées avec succès!!
		<button type="button" onclick="getElementById(\'notif\').hide()" style="margin-left:75%;">
		<a href="../liste_user.php"> <spam >x</spam> </a>
		</button>
		</div>
	';
}

if (isset($_POST["supprimer"])) {
	$id = $_POST["idUser"];
	$user = Utilisateur::AfficherUnique($id);
	$idPersonne = $user->idPersonne;
	$supuser = new Utilisateur('','','','');
	$supuser->Supprimer($id);

	$supPersonne = new Personne('', '', '', '');
	$supPersonne->Supprimer($idPersonne);

	echo '
		<div id="notif" style="background-color:#060">
		Données supprimer avec succès!!
		<button type="button" onclick="getElementById(\'notif\').hide()" style="margin-left:75%;">
		<a href="../liste_user.php"> <spam >x</spam> </a>
		</button>
		</div>
	';
}
?>
