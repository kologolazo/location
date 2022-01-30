<?php
session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Administration</title>
<meta http-equiv="Content-Type" content="text/html; " />
<style type="text/css">

</style>
<script language="javascript" type="text/javascript">
	function setFocus() {
		
	}
</script>
<link rel="stylesheet" type="text/css" href="habillage.css">
</head>

<body onload="setFocus();">
	
<noscript>
!Warning! Javascript must be enabled for proper operation of the Administrator
</noscript>
<?php
	include_once("../../classes/C_based.php");
	include_once("../../configuration/myconfig.inc.php");
	include_once("../../classes/Class_Utilisateur.php");
	//session_start();
if ( $_SESSION['profil']==1 ) {
//$_SESSION[user]
	?>
<div id="bandeau"> 	
	Espace ADMINISTRATION
	<?php 
		echo "Bonjour\n";
		echo "$_SESSION[user]\n";
	?>
</div>
<div id="contenu">
	<div id="menu_gauche">
		<a href="index.php">Retour a l'acceuil</a><br/>
		<a href="adduser.php" >créer un utilisitateur</a><br/>
		<a href="moduser.php" >modifier un utilisitateur</a><br/>
		<a href="moduser.php" >supprimer un utilisitateur</a><br/>
		<a href="mailuser.php" >envoyer un méssage à utilisitateur</a><br/>
		<a href= >voir les statistiques</a><br/>
		<a href="ges_part.php" >Creer Login Partenaire</a><br/>
		<a href="logout.php" >Deconnexion</a><br/>
	</div>
	
	<form action="adduser.php" method="post" name="adduserForm" id="adduserForm">
		Identifiant<input name="username" type="text" class="inputbox" size="15" /><br/>
		Mot de passe<input name="pass" type="password" class="inputbox" size="15" /><br/>
		Profil 
		<select name="profil">
			<option value="admin">Administrateur</option>
			<option value="moderateur">Moderateur</option>
			<option value="partenaire">Partenaire</option>
		</select><br/>
		EMail<input name="email" type="text" class="inputbox" size="15" /><br/>
		<input type="submit" name="submit" class="button" value="Valider" />
		<input type="reset" name="submit" class="button" value="Annuler" />
	</form>
	<?php 
    function VerifierAdresseMail($adresse)
     {
     $Syntaxe='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,5}$#';
     if(preg_match($Syntaxe,$adresse))
     return true;
     else
     return false;
     }
		if (isset( $_POST['submit'] )) {
			$username 	= $_POST['username'];
			$pass 		= $_POST['pass'];
			$profil		= $_POST['profil'];
			$email 			= $_POST['email'];
			if(($pass == NULL)||($username==NULL)||($email==NULL)) {
				echo "<script>alert('Veuillez saisir toutes les informations'); </script>\n";
			} else{
			//echo"$username"."<br/>";
			//echo"$pass"."<br/>";
			//echo"$profil"."<br/>";
			//echo"$email"."<br/>";
			$tab=Utilisateur::Rechercher_Login($username);
			//echo $tableau[1][1];
		if($tab){
			echo "le login ".$tab[1][1]." existe déja : -> Créer avec un autre login";
		}else{
			if(VerifierAdresseMail($email)){
				if($profil=="admin"){$profilentier=1;};
				if($profil=="moderateur"){$profilentier=2;};
				if($profil=="partenaire"){$profilentier=3;};
				//echo"$profilentier";
				 echo '<p>Votre adresse est valide.</p>';
				 $unutilisateur=new Utilisateur($username,$pass,$profilentier,$email);
				 $unutilisateur->Ajouter();
				 echo"<p>$username a été ajouter comme "."$profil</p>";
				 }
			 else{
				 echo '<p>Votre adresse e-mail n\'est pas valide.</p>';
				 }
			}
		}
	};
	
	?>
	
</div>
<div id="piedpage">
</div>
<?php }
else{
	echo '<SCRIPT LANGUAGE="JavaScript">
	document.location.href="../index.php" </SCRIPT>';
	exit;
	//echo"Vous avez ete deconnecter";
}
?>
	</body>
</html>