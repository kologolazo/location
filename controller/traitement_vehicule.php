<?php
include_once('../classes/Model.php');
if (isset($_POST["submit"])) {
    $immatriculation = $_POST["immatriculation"];
    $marque = $_POST["marque"];
    $couleur = $_POST["couleur"];

    $vehicule = new Vehicule($immatriculation, $marque, $couleur);

    $vehicule->Ajouter();

    echo '
		<div id="notif" style="background-color:#060">
		Données enregistrées avec succès!!
		<button type="button" onclick="getElementById(\'notif\').hide()" style="margin-left:75%;">
		<a href="../liste_vehicule.php"> <spam >x</spam> </a>
		</button>
		</div>
	';
}

if (isset($_POST['modifier'])) {
    $immatriculation = $_POST["immatriculation"];
    $marque = $_POST["marque"];
    $couleur = $_POST["couleur"];

    $id = $_POST["idVehicule"];

    $modifierVehicule = new Vehicule($immatriculation, $marque, $couleur);
    $modifierVehicule->Modifier($id);

    echo '
		<div id="notif" style="background-color:#060">
		Données enregistrées avec succès!!
		<button type="button" onclick="getElementById(\'notif\').hide()" style="margin-left:75%;">
		<a href="../liste_vehicule.php"> <spam >x</spam> </a>
		</button>
		</div>
	';
}

if (isset($_POST["supprimer"])) {
    $id = $_POST["idVehicule"];
    $supvehicule = new Vehicule('', '', '');
    $supvehicule->Supprimer($id);
    
    echo '
		<div id="notif" style="background-color:#060">
		Données supprimer avec succès!!
		<button type="button" onclick="getElementById(\'notif\').hide()" style="margin-left:75%;">
		<a href="../liste_vehicule.php"> <spam >x</spam> </a>
		</button>
		</div>
	';
}
