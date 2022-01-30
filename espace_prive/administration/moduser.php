<?php
session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Administration</title>
<meta http-equiv="Content-Type" content="text/html;" />
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
	//include_once("../C_based.php");
	//include_once("../myconfig.inc.php");
	//include_once("../Class_Utilisateur.php");
	//session_start();
if ( $_SESSION['profil']==1 ) {
//$_SESSION[user]
	?>
<div id="bandeau"> 	
	Espace ADMINISTRATION
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
	
	<?php 
		include_once("../../classes/C_based.php");
		include_once("../../configuration/myconfig.inc.php");
		include_once("../../classes/Class_Utilisateur.php");
    
	 $tableau=Utilisateur::Listing();
	$i=1;
	$j=3;
	$k=4;
	echo"<table>";
	 foreach($tableau as $ligne){
	 $login=$ligne[$i];
	 $i=$i+4;
	 $profil=$ligne[$j];
	 $j=$j+4;
	 $email=$ligne[$k];
	 $k=$k+4;
	 echo"<tr>";
		echo" <td>".$login."<td>";
		if($profil==1){
		echo" <td>"."Administrateur"."<td>";
		};
		if($profil==2){
		echo" <td>"."Moderateur"."<td>";
		};
		if($profil==3){
		echo" <td>"."Partenaire"."<td>";
		};
		echo" <td>".$email."<td>";
		echo" <td>";
			echo"<a href=moduser.php?user=".$login.">"."Modifier"."</a>"."<br/>";
			echo"<a href=mailuser.php >"."Envoyer un email"."</a>"."</br>";
			echo"<a href=deluser.php?user=".$login.">"."Suprimer"."</a>";
		echo"<td>";
	echo"</tr>";
	 }
	echo"</table>";
	
	if (isset( $_GET['user'] )) {
		$username 	= $_GET['user'];
		echo"Modifcation des parametres de ".$username;
		?>
		
		<form action="moduser.php" method="post" name="adduserForm" id="adduserForm">
		<input name="username" type="hidden" class="inputbox" size="15" value="<?php echo$username?>" /><br/>
		Nouveau Mot de passe<input name="pass" type="password" class="inputbox" size="15" /><br/>
		Nouveau Profil 
		<select name="profil">
			<option value="1">Administrateur</option>
			<option value="2">Moderateur</option>
			<option value="3">Partenaire</option>
		</select><br/>
		Nouveau EMail<input name="email" type="text" class="inputbox" size="15" /><br/>
		<input type="submit" name="submit" class="button" value="Valider" />
		<input type="reset" name="submit" class="button" value="Annuler" />
	</form>
		<?php		
	};
	
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
			if(VerifierAdresseMail($email)){
				//echo"$profilentier";
				 //echo '<p>Votre adresse est valide.</p>';
				 $unutilisateur=new Utilisateur($username,$pass,$profil,$email);
				 $unutilisateur->Modifier();
				 echo"<p>$username a été modifier comme "."$profil</p>";
				 }
			 else{
				 //echo '<p>Votre adresse e-mail n\'est pas valide.</p>';
				 }
			}
	};
	
	?>
	
	<div id="menu_droite"> 
		<?php 
		echo "Bonjour\n";
		echo "$_SESSION[user]\n";
		?>
	</div>
</div>
<div id="piedpage">
</div>
<?php }
else{
	echo '<SCRIPT LANGUAGE="JavaScript">
	document.location.href="index.php" </SCRIPT>';
	exit;
	//echo"Vous avez ete deconnecter";
}
?>
	</body>
</html>