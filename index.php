<?php
	include_once('./classes/Model.php');
	if ($_SESSION) {
		header('location:accueil.php');
	}else{
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
			<div class ="contenu">
				<div class="ligne" style="margin-top: 80px;">
					<div class="pos-3"></div>
					<div class="pos-6" style="background-color: #e6e9ed; padding-bottom: 25px;padding-top: 25px;">

						<form action="index.php" method="post" name="loginForm" id="loginForm">
							<div class="ligne">
								<label class="pos-3 control-label">Identifiant :</label>
								<input name="identifiant" type="text" class="pos-8 inputbox"/><br/><br/><br/>
								<label class="pos-3 control-label">Mot de passe :</label>
								<input name="password" type="password" class="pos-8 inputbox" /><br/>
							</div><br/><br/>
							<div class="ligne" style="margin-left: 220px;">
								<input type="submit" name="submit" class="pos-4 button" value="Valider" />
								<div class="pos-4"></div>
								<a href="register.php" class="pos-3">S'incrire</a>

							</div>

						</form>
					</div>
					<div class="pos-3"></div>
				</div>
			</div>

				</div>
				<div id="piedpage">
				</div>
	</body>
</html>
<?php

	/* Identification dans l'espace public */
	if (isset( $_POST['submit'] )) {
	$username 	= $_POST['identifiant'];
	$pass = $_POST['password'];
	/*if($pass == NULL) {
		echo "<script>alert('Veuillez saisir votre mot de passe.'); document.location.href='index.php?mosmsg=Veuillez saisir votre mot de passe'</script>\n";
		exit();
	} ;*/

	$adminis=new Utilisateur($username,$pass,"","");
	$existance=$adminis->Is_User();

	if ($existance[0] !='') {
		$adminis->Login($existance[3]);
		header('location:accueil.php');
	}else{
		echo '<script language="JavaScript"> alert("Identifiant ou mot de passe incorrect"); </script>';
	}
	}

?>
</body>
</html>>
<?php
	}
?>
