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

	@import URL(css/style.css);

</style>
</head>
<body>
<br>
		<nav class ="cart">
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
<center><h1><font color='white'>Menu Responsable</h1></center>
	<fieldset>
<CENTER>
				<p></p>
				<fieldset>
				<center><h2><font color='black'>Gestion Personnelle</h2></center>
				<FORM ACTION="joinActivite.php">
    			<INPUT TYPE="SUBMIT" VALUE="  Rejoindre Activité  " style="width: 300px; height: 40px;">
  				</FORM>

				<FORM ACTION="mesActivites.php">
    			<INPUT TYPE="SUBMIT" VALUE="  Mes Activités  " style="width: 300px; height: 40px;">
  				</FORM>
				  
</fieldset> 
<br>
<fieldset>
				<center><h2><font color=>Gestion Medecins</h2></center>


				<FORM ACTION="listeActivites.php">
    			<INPUT TYPE="SUBMIT" VALUE="     Gérer les Activités     "  style="width: 300px; height: 40px;">
  				</FORM>

</fieldset>	
<br>
<fieldset>
				<center><h2><font color=>Gestion des Activités</h2></center>
				<FORM ACTION="creerActivite.php">
    			<INPUT TYPE="SUBMIT" VALUE="   Créer Activité   " style="width: 300px; height: 40px;">
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
    			<INPUT TYPE="SUBMIT" VALUE="     Consulter Tableaux     "  style="width: 300px; height: 40px;">
  				</FORM>
</fieldset>
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
		
		
