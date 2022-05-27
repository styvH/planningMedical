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

	@import URL(css/style.css);

</style>
</head>
<body style = 'text-align: center'>
<br>
		<nav class ="logo">
		<ul>

            <li class="start">
				
				<a href="menuRedirect.php">Menu</a>
				
			</li>

			<li class="start">
				
				<a href="Profil.php">Profil</a>
				
			</li>
			<li class="start">

				<a href="support">Support</a>

			</li>
		</ul>
	</nav>
<h1><font color=>Menu</h1>

				<p></p>
		<fieldset>		

				<FORM ACTION="joinActivite.php">
    			<INPUT TYPE="SUBMIT" VALUE="     Rejoindre Activités     " style="width: 300px; height: 40px;">
  				</FORM>

				<FORM ACTION="mesActivites.php">
    			<INPUT TYPE="SUBMIT" VALUE="Consulter Activités" style="width: 300px; height: 40px;">
  				</FORM>

				<FORM ACTION="consulterPlanning.php">
    			<INPUT TYPE="SUBMIT" VALUE="Consulter Plannings" style="width: 300px; height: 40px;">
  				</FORM>
				<FORM ACTION="consulterPlanningGarde.php">
    			<INPUT TYPE="SUBMIT" VALUE="Consulter Planning Gardes" style="width: 300px; height: 40px;">
  				</FORM>
				<FORM ACTION="listeTableaux.php">
    			<INPUT TYPE="SUBMIT" VALUE="     Consulter Tableaux     "  style="width: 300px; height: 40px;">
  				</FORM>

</fieldset>
					<br><br>

	<FORM ACTION="deco.php">
    			<INPUT TYPE="SUBMIT" VALUE="Déconnexion">
  				</FORM>
	
</body>
</html>

<?php	
	}
	else
		header('Location: Accueil.php');
?>
		
		

		
