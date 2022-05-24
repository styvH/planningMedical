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
<TITLE>Ajout-Type-Activité</TITLE>
</HEAD>

<BODY>
<CENTER><H3>Ajouter un Type d'Activité</H3></CENTER>
<br>


<FORM ACTION="ajoutType2.php" METHOD="POST"">
	<table align="center" border="0">
	
	
	<tr>
	<td>IDENTIFIANT:</td>
	<td><input type="text" name="idType" id = "idType"><br></br></td>
	</tr>
	
	<tr>
	<td>abréviation:</td>
	<td><input type="text" name="abrev" id = "abrev"><br></br></td>
	</tr>


	<tr>
	<td>Nom du Type:</td>
	<td><input type="text" name="nom" id = "nom"><br></br></td>
	</tr>

    <tr>
	<td>Description du type:</td>
	<td><input type="text" name="desc" id = "desc"><br></br></td>
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
