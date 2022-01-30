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
		
	if (isset( $_GET['user'] )) {
		$username 	= $_GET['user'];
		$delluser=new Utilisateur($username,"","","");
		$delluser->Supprimer();
		echo"suppression des parametres de ".$username;
		$message="voulez vous vraiment supprimer ";
		echo "<script>alert($message); </script>\n";
		}
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
	document.location.href="../index.php" </SCRIPT>';
	exit;
	//echo"Vous avez ete deconnecter";
}
?>
	</body>
</html>