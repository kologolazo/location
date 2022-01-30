<?php
session_start();
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
	<div class="ligne">
			<div class="navbar">
			<div class="pos-6">
				<div class="pos-1">
					<a href="#">Accueil</a>
				</div>
				<div class="pos-1">
					<a href="#">Rechercher</a>
				</div>
				<div class="pos-1">
					<a href="#">Se connecter</a>
				</div>
			</div>
			</div>
	</div>
	<div class="main-panel">
		<div class="ligne">
			<div class="pos-6">
				<form action="index.php" method="post" name="loginForm" id="loginForm">
					Identifiant<input name="username" type="text" class="inputbox" size="15" /><br/>
					Mot de passe<input name="pass" type="password" class="inputbox" size="15" /><br/>
					<input type="submit" name="submit" class="button" value="Valider" />
				</form>
			</div>
			<div class="pos-5">
				<form action="index.php" method="post" name="loginForm" id="loginForm">
					Identifiant<input name="identifiant" type="text" class="inputbox" size="15" /><br/>
					Mot de passe<input name="password" type="password" class="inputbox" size="15" /><br/>
					<select class="form-control form-control-lg" id="exampleFormControlSelect2">
          </select>
                    <br/>
					Mot de passe<input name="pass" type="password" class="inputbox" size="15" /><br/>
					Profil<input name="pass" type="password" class="inputbox" size="15" /><br/>
					<input type="submit" name="submit" class="button" value="Valider" />
				</form>
			</div>
		</div>
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
	$username 	= $_POST['username'];
	$pass 		= $_POST['pass'];
	$existance[2]=0;
	if($pass == NULL) {
		echo "<script>alert('Veuillez saisir votre mot de passe.'); document.location.href='index.php?mosmsg=Veuillez saisir votre mot de passe'</script>\n";
		exit();
	} ;
	$adminis=new Utilisateur($username,$pass,"","");
	$existance=$adminis->Is_User();
	//echo "ligne 0:".$existance[0]."<br>";echo "ligne 1:".$existance[1]."<br>";echo "ligne 2:".$existance[2]."<br>";echo "ligne 3:".$existance[3]."<br>";
	//echo" ";
	if ($existance[2]==1){
		//echo"$username";
		$adminis->Login();
		//echo"Vous ete admin";
		echo '<SCRIPT LANGUAGE="JavaScript">
document.location.href="index.php" </SCRIPT>';
exit;
	}
	else{
		if ($existance[2]==2){
			//echo"$username";
			$adminis->Login();
			//echo"Vous ete Moderateur";
			echo '<SCRIPT LANGUAGE="JavaScript">
document.location.href="index.php" </SCRIPT>';
exit;
		}
		else{
			if ($existance[2]==3){
				//echo"$username";
				$adminis->Login();
				//echo"Vous ete partenaire";
				echo '<SCRIPT LANGUAGE="JavaScript">
document.location.href="index.php" </SCRIPT>';
exit;
			}
			else{
		echo"Identifiant ou mot de passe incorrect reessayer";
			};
		};
	}
	}
?>
