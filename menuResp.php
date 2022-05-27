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
<body style = 'text-align: center'>
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
<h1><font color='white'>Menu Responsable</h1>
	<fieldset>

				<p></p>
				<fieldset>
				<h2><font color='black'>Gestion Personnelle</h2>
				<FORM ACTION="joinActivite.php">
    			<INPUT TYPE="SUBMIT" VALUE="  Rejoindre Activité  " style="width: 300px; height: 40px;">
  				</FORM>

				<FORM ACTION="mesActivites.php">
    			<INPUT TYPE="SUBMIT" VALUE="  Mes Activités  " style="width: 300px; height: 40px;">
  				</FORM>
				  
</fieldset> 
<br>
<fieldset>
				<h2><font color=>Gestion Medecins</h2>


				<FORM ACTION="gestionMedecin.php">
    			<INPUT TYPE="SUBMIT" VALUE="     Gérer les Activités     "  style="width: 300px; height: 40px;">
  				</FORM>

</fieldset>
<br>
<fieldset>
				<h2><font color=>Gestion des Activités</h2>
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
    			<INPUT TYPE="SUBMIT" VALUE="   Consulter liste des Type Activités   "  style="width: 300px; height: 40px;">
  				</FORM>

  				<FORM ACTION="listeTableaux.php">
    			<INPUT TYPE="SUBMIT" VALUE="     Consulter Tableaux     "  style="width: 300px; height: 40px;">
  				</FORM>
</fieldset>
	
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
