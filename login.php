<?php
	include_once("entete.php");
	?>
<div class ="contenu">
		<div class="ligne" style="margin-top: 80px;">
			<div class="pos-3"></div>
			<div class="pos-6" style="background-color: #e6e9ed; padding-bottom: 25px;padding-top: 25px;">

				<form action="index.php" method="post" name="loginForm" id="loginForm">
					<div class="ligne">
						<label class="pos-3 control-label">Identifiant :</label>
						<input name="username" type="text" class="pos-8 inputbox" size="15" /><br/><br/><br/>
						<label class="pos-3 control-label">Mot de passe :</label>
						<input name="pass" type="password" class="pos-8 inputbox" size="15" /><br/>
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
