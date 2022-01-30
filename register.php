<?php
include_once('./classes/Model.php');
if ($_SESSION && $_SESSION['idProfil'] != 1) {
	header('location:accueil.php');
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
		<div class="contenu">

			<div class="ligne" style="margin-top: 80px;">
				<div class="ligne">
					<div class="pos-3">

					</div>
					<div class="pos-6">
						<h4>Inscription</h4>
					</div>
				</div>
				<div class="ligne">
					<div class="pos-3"></div>

					<div class="pos-6" style="background-color: #e6e9ed; padding-bottom: 25px;padding-top: 25px;">

						<form action="./controller/traitement_user.php" method="post" id="">
							<div class="ligne">
								<label for="nom" class="pos-3 control-label">Nom :</label>
								<input id="nom" name="nom" type="text" class="pos-8 inputbox" required />
							</div>

							<div class="ligne">
								<label for="prenom" class="pos-3 control-label">Prénom :</label>
								<input id="prenom" name="prenom" type="text" class="pos-8 inputbox" required />
							</div>

							<div class="ligne">
								<label for="sexe" class="pos-3 control-label">Sexe :</label>
								<select id="sexe" class="pos-8" name="sexe" required>
									<option value="">&nbsp;</option>
									<option value="Masculin">Masculin</option>
									<option value="Feminin">Feminin</option>
								</select>
							</div>

							<div class="ligne">
								<label for="telephone" class="pos-3 control-label">Téléphone :</label>
								<input id="telephone" name="telephone" type="text" class="pos-8 inputbox" required />
							</div>

							<div class="ligne">
								<label for="identifiant" class="pos-3 control-label">Identifiant :</label>
								<input id="identifiant" name="identifiant" type="text" class="pos-8 inputbox" required />
							</div>

							<div class="ligne">
								<label for="password" class="pos-3 control-label">Mot de passe :</label>
								<input id="password" name="password" type="password" class="pos-8 inputbox" required />
							</div>

							<div class="ligne">
								<label for="idProfil" class="pos-3 control-label">Profil :</label>
								<select id="idProfil" class="pos-8" name="idProfil" required>
									<option value="">&nbsp;</option>
									<option value="2">Propriètaire</option>
									<option value="3">Client</option>
								</select>
							</div>
							<div class="ligne" style="margin-left: 200px;">
								<input type="submit" name="submit" class="pos-6 button" value="Enregistrer" />
								<a href="accueil.php" class="pos-5 button" value="Enregistrer" />Retour</a>

							</div>

						</form>
					</div>
					<div class="pos-3"></div>
				</div>
			</div>
		</div>
		</div>
		<div id="piedpage">
		</div>
	</body>

	</html>

<?php
}
?>