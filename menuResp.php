<?php
	include('connexion.php');
	if(isset($_SESSION['login']) && isset($_SESSION['ACCESS']))
	{
		if($_SESSION['ACCESS'] == "Med"){
			header('location: menuMed.php');
		}


?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<style type="text/css">
	<!--
	@import URL(css/style.css);
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
	<fieldset>
<CENTER>
				<p></p>

				<FORM ACTION="consulterRapport.php">
    			<INPUT TYPE="SUBMIT" VALUE="  Rejoindre Activité  " style="width: 300px; height: 40px;">
  				</FORM>

				<FORM ACTION="creerActivite.php">
    			<INPUT TYPE="SUBMIT" VALUE="   Créer Activité   " style="width: 300px; height: 40px;">
  				</FORM>

				<FORM ACTION="consulterRapport.php">
    			<INPUT TYPE="SUBMIT" VALUE="  Attribuer Activité  " style="width: 300px; height: 40px;">
  				</FORM>


  				<FORM ACTION="ajoutSecteur.php">
    			<INPUT TYPE="SUBMIT" VALUE="     Ajouter Secteur     "  style="width: 300px; height: 40px;">
  				</FORM>

				<FORM ACTION="ajoutTypeActivite.php">
    			<INPUT TYPE="SUBMIT" VALUE="   Ajouter Type Activité   "  style="width: 300px; height: 40px;">
  				</FORM>

  				<FORM ACTION="consulterSecteurs.php">
    			<INPUT TYPE="SUBMIT" VALUE="     Consulter Liste des Secteurs     "  style="width: 300px; height: 40px;">
  				</FORM>

				<FORM ACTION="consulterTypeActivite.php">
    			<INPUT TYPE="SUBMIT" VALUE="   Consutler liste des Type Activités   "  style="width: 300px; height: 40px;">
  				</FORM>

  				<FORM ACTION="">
    			<INPUT TYPE="SUBMIT" VALUE="     Rechercher Activité     "  style="width: 300px; height: 40px;">
  				</FORM>

  				<FORM ACTION="">
    			<INPUT TYPE="SUBMIT" VALUE="     Consulter Tableaux     "  style="width: 300px; height: 40px;">
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
		
		
