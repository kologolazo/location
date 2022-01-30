<?php
include_once("./classes/Model.php");
if (!$_SESSION) {
	header('location:index.php');
} else {
?>
	<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<title>ACCUEIL</title>
		<meta http-equiv="Content-Type" content="text/html; " />
		<style type="text/css">

		</style>
		<script language="javascript" type="text/javascript">
			function setFocus() {

			}
		</script>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>

	<body onload="setFocus();">

		<noscript>
			!Warning! Javascript must be enabled for proper operation of the Administrator
		</noscript>
		<?php
		include_once("classes/C_based.php");
		include_once("classes/Class_Utilisateur.php");
		//include_once("classes/Class_Sujet.php");
		//include_once("fonctions.php");
		?>
		<div class="ligne" style="background-color: #060; padding: 1%;">
			<div class="pos-1">
				<a href="index.php" style="color: #fff">Accueil</a>
			</div>
			<div class="pos-1">
				<a href="liste_vehicule.php" style="color: #fff">Vehicules</a>
			</div>
			<?php
			if ($_SESSION['idProfil'] == 1) {
			?>
				<div class="pos-1">
					<a href="liste_user.php" style="color: #fff">Utilisateur</a>
				</div>
			<?php
			}
			?>
			<div class="pos-1">
				<a href="logout.php" style="color: #fff">Se déconnecter</a>
			</div>

			<div class="pos-5">

				<span style="color: #fff">| Système de location de véhicule</span>
			</div>
		</div></br>
	<?php
}
	?>