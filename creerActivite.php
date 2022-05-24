<?php
	include('connexion.php');
    // Note page : Changer Format du formulaire en une seule ligne!
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<style type="text/css">

	@import URL(css/style.css);
	
</style>
<title>Créer Activité</title>
</head>

<BODY>
<CENTER><H3>Ajouter une Activité</H3></CENTER>
<br>

<FORM ACTION="creerActivite2.php" METHOD="POST"">
	<table align="center" border="3" BGCOLOR="white">
	
	<tr>
	<td>Description Activité:</td>
	<td>Heure Début</td>
	<td>Heure Fin</td>
	<td>Jour</td>
	<td>Type d'Activité</td>
	<td>Renouveler ?</td>
	<td>Dernier Minute ?</td>
	</tr>


    <tr>

	<!-- Description -->
	<td><input type="text" name="desc" id = "desc"></td>
	<!-- Heure Debut -->

	
	<td>
	<select type="text" name="heureDeb" id = "heureDeb" required>
    <option value=NULL></option>
	
	<?php

        for($i = 0; $i < 24; $i++)
        {         

                echo "<option value='$i'>$i</option>";          
            
        }
	?>
	</select>
	</td>

	<!-- HeureFin -->
	
	<td>
	<select type="text" name="heureFin" id = "heureFin" required>
    <option value=NULL></option>
	
	<?php

        for($i = 0; $i < 24; $i++)
        {         

                echo "<option value='$i'>$i</option>";          
            
        }
	?>
	</select>
	</td>


	<!-- Journee -->
	<td><input type="date" name="dateDeb" id = "dateDeb" required><br></br></td>


	
	<td>
	<select type="text" name="type" id = "type">
    <option value=NULL></option>
	
	<?php
    $link=mysqli_connect("localhost","root","","planning_medical");

    $sql= "SELECT * FROM type_activite ";
     
    $result=mysqli_query($link,$sql);   
    $ligne = mysqli_fetch_assoc($result);


        while($ligne)
        {         
                $idTA=$ligne['Id_TYPE_ACTIVITE'];
                $abrev = $ligne['abreviation'];
                $nomType = $ligne['libelle_type'];
                echo "<option value='$idTA'>$idTA - $abrev - $nomType</option>";
    
            $ligne = mysqli_fetch_assoc($result);
            
            
        }
	?>
	</select>
	</td>

	<td><input type="checkbox" name="renouv" id = "renouv"></td>
	<td><input type="checkbox" name="urgent" id = "urgent"></td>
	
	




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
