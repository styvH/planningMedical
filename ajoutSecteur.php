<?php
	include('connexion.php');
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
<TITLE>Ajout-Secteur</TITLE>
</HEAD>

<BODY>
<CENTER><H3>Ajouter un Secteur</H3></CENTER>
<br>


<FORM ACTION="ajoutSecteur2.php" METHOD="POST"">
	<table align="center" border="0">
	
	
	<tr>
	<td>IDENTIFIANT:</td>
	<td><input type="text" name="idSecteur" id = "idSecteur"><br></br></td>
	</tr>
	
	<tr>
	<td>Nom du Secteur:</td>
	<td><input type="text" name="nom" id = "nom"><br></br></td>
	</tr>


	
	<tr>
	<td>Nombre Medecin Requis:</td>
	<td>
	<select type="text" name="nombre" id = "nombre">

	
	<?php
		for($i=0;$i<=10;$i++){
			echo "<option value='$i'>$i</option>";
		}
	?>
		
		<br></br></td>
	
	</select>
	</tr>

	</table>
	</center>
	<br><br>
	<center><input type="submit" name="formid" id="formid" value="Enregistrer" ></center>
		</form>
		<br><br>
<center>
	<FORM ACTION="menuRedirect.php">
    			<INPUT TYPE="SUBMIT" VALUE="Retour Menu">
  				</FORM>
</center>	


</BODY>



</HTML>
