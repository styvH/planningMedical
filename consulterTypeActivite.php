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
	<!--
	@import URL(css/style.css);
	-->
</style>
<TITLE>Liste des Type d'Activité</TITLE>
</HEAD>

<BODY background="">
<CENTER><H3>Liste des Type d'Activité</H3></CENTER>
<br>

<?php

$link=mysqli_connect("localhost","root","","planning_medical");

$sql= "SELECT * FROM type_activite ";
 
$result=mysqli_query($link,$sql);   
$ligne = mysqli_fetch_assoc($result);
	echo '<table align="center" border="3" BGCOLOR="white">';
	echo "<tr style = 'background-color : #028aa9'>";
		echo "<td>ID Type Activité</td>";
        echo "<td>Abréviation</td>";
		echo "<td>Nom Type</td>";
        echo "<td>Description du Type</td>";
		echo "<td>Supprimer?</td>";
	echo "</tr>";
	

	while($ligne)
	{
		
		
		echo"<tr>";
			$num=$ligne['Id_TYPE_ACTIVITE'];
            echo"<td>".$ligne['Id_TYPE_ACTIVITE']."</td>";
            echo"<td>".$ligne['abreviation']."</td>";
			echo"<td>".$ligne['libelle_type']."</td>";
			echo"<td>".$ligne['description_type']."</td>";
			echo"<td> <a href=supprimerTypeAct.php?id=$num>supprimer</a></td>";
			
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
	<FORM ACTION="ajoutTypeActivite.php">
    			<INPUT TYPE="SUBMIT" VALUE="Ajouter un Type" style="width: 200px; height: 40px;">
  				</FORM>
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