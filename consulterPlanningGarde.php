<?php
	include('connexion.php');
	if(isset($_SESSION['login']))
	{


        $dayToJour = array(
            "Mon" => "Lundi",
            "Tue" => "Mardi",
            "Wed" => "Mercredi",
            "Thu" => "Jeudi",
            "Fri" => "Vendredi",
            "Sat" => "Samedi",
            "Sun" => "Dimanche",
        );

?>


<!DOCTYPE html>
<html>
<HEAD>
<meta charset="utf-8" />
<style type="text/css">
	@import URL(css/style.css);
</style>
<TITLE>Liste Activités</TITLE>
</HEAD>

<BODY background="">
<CENTER><H2>Liste des Activités</H2></CENTER>
<br>

<?php

$link=mysqli_connect("localhost","root","","planning_medical");

echo "<CENTER><H3>Du Jour</H3></CENTER>";

$sql= "SELECT date_debut,nom,prenom
FROM activite,medecin,effectuer 
WHERE activite.Id_ACTIVITE = effectuer.Id_ACTIVITE 
AND effectuer.Id_Medecin = medecin.idMedecin

AND Id_TYPE_ACTIVITE ='G' " ;

$sqlastr= "SELECT date_debut,nom,prenom
FROM activite,medecin,effectuer 
WHERE activite.Id_ACTIVITE = effectuer.Id_ACTIVITE 
AND effectuer.Id_Medecin = medecin.idMedecin

AND Id_TYPE_ACTIVITE ='A' " ; 

$result=mysqli_query($link,$sql);   
$ligne = mysqli_fetch_assoc($result);

$resultastr=mysqli_query($link,$sqlastr);   
$ligneastr = mysqli_fetch_assoc($resultastr);


echo '<table align="center" border="3" BGCOLOR="white">';
echo "<tr style = 'background-color : #028aa9'>";
    
    
   
    echo "<td>Date</td>";
    echo "<td>Garde</td>";
    echo "<td>Astreinte</td>";
    
        
    
    
    
echo "</tr>";
	

    while($ligne) // probleme possible si nombre astreitne et garde non identique/ solution à séparer
    {
        $orderdate = explode('-', $ligne["date_debut"]);
        $year = $orderdate[0];
        $month   = $orderdate[1];
        $day  = $orderdate[2];


        $timestamp = mktime(0, 0, 0, $month, $day, $year); //Donne le timestamp correspondant à cette date
        
        $joursemaine = $dayToJour[date('D', $timestamp)]; //Ecrira les 3 premières lettres du jour en anglais, dans ton cas cela écrire Tue, si tu veux afficher Mardi il suffira juste alors de faire un tableau associatif, pareil si tu veux afficher 2.
        $dateJMA = $day."/".$month."/".$year;
        
        echo"<tr>";
            
            
            echo"<td>".$joursemaine." ".$dateJMA."</td>";
            echo"<td>".$ligne['nom']." ".$ligne['prenom']."</td>";
            echo"<td>".$ligneastr['nom']." ".$ligneastr['prenom']."</td>";
           
            
        echo"</tr>";

        $ligne = mysqli_fetch_assoc($result);
        $ligneastr = mysqli_fetch_assoc($resultastr);
        
    }
	


/*Libération des résultats*/
mysqli_free_result($result);

mysqli_close($link); 





	echo"</table>";
?>	

</CENTER>

<br><br>

<center>
	<FORM ACTION="creerActivite.php">
    			<INPUT TYPE="SUBMIT" VALUE="Ajouter une Activité" style="width: 200px; height: 40px;">
  				</FORM>
</center>

<br>
<center>
	<FORM ACTION="joinActivite.php">
    			<INPUT TYPE="SUBMIT" VALUE="Rejoindre une Activité" style="width: 200px; height: 40px;">
  				</FORM>
</center>
<br>

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