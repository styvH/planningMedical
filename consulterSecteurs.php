<?php
	include('connexion.php');
	if(isset($_SESSION['login']))
	{
?>


<!DOCTYPE html>
<html>
<HEAD>
<meta charset="utf-8" />
<style type="text/css">
	@import URL(css/style.css);
</style>
<TITLE>Liste des Secteurs</TITLE>
</HEAD>

<BODY background="">
<CENTER><H3>Liste des Secteurs</H3></CENTER>
<br>

<?php

$link=mysqli_connect("localhost","root","","planning_medical");

$sql= "SELECT * FROM secteur ";
 
$result=mysqli_query($link,$sql);   
$ligne = mysqli_fetch_assoc($result);
	echo '<table align="center" border="3" BGCOLOR="white">';
	echo "<tr style = 'background-color : #028aa9'>";
		echo "<td>ID Secteur</td>";
		echo "<td>Nom Secteur</td>";
        echo "<td>Nombre Medecin Requis</td>";
		echo "<td>Supprimer?</td>";
	echo "</tr>";
	

	while($ligne)
	{
		
		
		echo"<tr>";
			$num=$ligne['Id_SECTEUR'];
            echo"<td>".$ligne['Id_SECTEUR']."</td>";
			echo"<td>".$ligne['nomSecteur']."</td>";
			echo"<td>".$ligne['nombreMedecinRequis']."</td>";
			echo"<td> <a href=supprimSecteur.php?id=$num>supprimer</a></td>";
			
		echo"</tr>";

		$ligne = mysqli_fetch_assoc($result);
		
		
	}
	
	echo"</table>";





/*Libération des résultats*/
mysqli_free_result($result);

mysqli_close($link); 





	echo"</table>";
?>	

</CENTER>

<br><br>

<center>
	<FORM ACTION="ajoutSecteur.php">
    			<INPUT TYPE="SUBMIT" VALUE="Ajouter un Secteur" style="width: 200px; height: 40px;">
  				</FORM>
</center>

<br><br>
<center>
	<a href="downloadSecteur.php?name=listeSecteurs">
    	<button style="width: 200px; height: 40px; background-color:aquamarine">Télecharger Format Excel</button>
	</a>
</center>

<br><br>
<center>
	<FORM ACTION="menuRedirect.php">
    			<INPUT TYPE="SUBMIT" VALUE="Retour Menu" style="width: 200px; height: 40px;">
  				</FORM>
</center>

</BODY>
</HTML>

<?php
	}
	else
		{
			echo "Vous ne vous etes pas authentifié";
		}	
?>