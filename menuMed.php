<?php
	include('connexion.php');
	if(isset($_SESSION['login']) && isset($_SESSION['ACCESS']))
	{
		if($_SESSION['ACCESS'] == "Resp"){
			header('location: menuResp.php');
		}


?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<style type="text/css">
	<!--
	@import URL(css/style.css);
	@import URL(css/test.css);
	-->
</style>
</head>
<body background=img/>
<br>
		<nav class ="menu-nav">
		<ul>

			<li class="start">
				
				<a href="Profil.php">Profil</a>
				
			</li>
			<li class="start">

				<a href="#">Support</a>

			</li>
		</ul>
	</nav>
<center><h1><font color=>Menu</h1></center>

				<p></p>
		<fieldset>		
<CENTER>
				<FORM ACTION="joinActivite.php">
    			<INPUT TYPE="SUBMIT" VALUE="     Rejoindre Activités     " style="width: 300px; height: 40px;">
  				</FORM>

				<FORM ACTION="consulterSesRapports.php">
    			<INPUT TYPE="SUBMIT" VALUE="Consulter Activités" style="width: 300px; height: 40px;">
  				</FORM>

				<FORM ACTION="consulterSesRapports.php">
    			<INPUT TYPE="SUBMIT" VALUE="Consulter Plannings" style="width: 300px; height: 40px;">
  				</FORM>
</CENTER>
</fieldset>
					<br><br>
<center>
	<FORM ACTION="deco.php">
    			<INPUT TYPE="SUBMIT" VALUE="Déconnexion">
  				</FORM>
</center>	
</body>
</html>

<?php	
	}
	else
		header('Location: Accueil.php');
?>
		
		

		
