<?php
	include('connexion.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<style type="text/css">

	@import URL(css/style.css);

</style>
<TITLE>Ajout-Type-Activité</TITLE>
</HEAD>

<BODY style = 'text-align:center'>
<H3>Ajouter un Type d'Activité</H3>
<br>


<FORM ACTION="ajoutType2.php" METHOD="POST">
	<table style = 'margin :auto; border: 0'>
	
	
	<tr>
	<td>IDENTIFIANT:</td>
	<td><input type="text" name="idType" id = "idType"><br></br></td>
	</tr>
	
	<tr>
	<td>Abréviation:</td>
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

	<tr>
	<td>Secteur :</td>
	<td>
	<select type="text" name="secteur" id = "secteur" required>
    <option value=NULL>ID - Nom - NbMedecins Requis</option>
	
	<?php
    $link=mysqli_connect("localhost","root","","planning_medical");

    $sql= "SELECT * FROM secteur ";
     
    $result=mysqli_query($link,$sql);   
    $ligne = mysqli_fetch_assoc($result);


        while($ligne)
        {         
                $idSec=$ligne['Id_SECTEUR'];
                $nomSec = $ligne['nomSecteur'];
                $nbMed = $ligne['nombreMedecinRequis'];
                echo "<option value='$idSec'>$idSec - $nomSec - $nbMed</option>";
    
            $ligne = mysqli_fetch_assoc($result);
            
            
        }
	?>
	</select><br></br></td>
	</tr>
	

	</table>
	<br><br>
	<input type="submit" name="formid" id="formid" value="Enregistrer" >
		</form>
		<br><br>

	<FORM ACTION="menuRedirect.php">
    			<INPUT TYPE="SUBMIT" VALUE="Retour Menu">
  				</FORM>



</BODY>



</HTML>
