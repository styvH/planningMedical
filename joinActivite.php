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

$sql= "SELECT * FROM activite where date_debut = CURDATE() ORDER BY date_debut";
 
$result=mysqli_query($link,$sql);   
$ligne = mysqli_fetch_assoc($result);



	echo '<table align="center" border="3" BGCOLOR="white">';
	echo "<tr style = 'background-color : #028aa9'>";
		echo "<td>ID</td>";
        echo "<td>Type Activite</td>";
		echo "<td>Description</td>";
		echo "<td>Date</td>";
		echo "<td>heureDebut</td>";
		echo "<td>heureFin</td>";

        echo "<td>Nombre Medecin Actuel</td>";
        
		echo "<td>Rejoindre ? <br>(Vérifiez Horaires)</td>";
	echo "</tr>";
	

    while($ligne)
    {
        $orderdate = explode('-', $ligne["date_debut"]);
        $year = $orderdate[0];
        $month   = $orderdate[1];
        $day  = $orderdate[2];


        $timestamp = mktime(0, 0, 0, $month, $day, $year); //Donne le timestamp correspondant à cette date
        
        $joursemaine = $dayToJour[date('D', $timestamp)]; //Ecrira les 3 premières lettres du jour en anglais, dans ton cas cela écrire Tue, si tu veux afficher Mardi il suffira juste alors de faire un tableau associatif, pareil si tu veux afficher 2.
        $dateJMA = $day."/".$month."/".$year;
        
        echo"<tr>";
            $num=$ligne['Id_ACTIVITE'];
            echo"<td>".$ligne['Id_ACTIVITE']."</td>";
            echo"<td>".$ligne['Id_TYPE_ACTIVITE']."</td>";
            echo"<td>".$ligne['description']."</td>";
            echo"<td>".$joursemaine." ".$dateJMA."</td>";
            echo"<td>".$ligne['heure_debut'].":00</td>";
            echo"<td>".$ligne['heure_fin'].":00</td>";
            
            echo"<td>".$ligne['nombreMedecinActuel']."</td>";
            echo"<td> <a href=joinActivite2.php?id=$num><button >JOIN</button></a></td>";
            
        echo"</tr>";

        $ligne = mysqli_fetch_assoc($result);
        
        
    }
	
	echo"</table>";
echo "<CENTER><H3>A venir</H3></CENTER>";

$sql= "SELECT * FROM activite where date_debut > CURDATE() ORDER BY date_debut";
 
$result=mysqli_query($link,$sql);   
$ligne = mysqli_fetch_assoc($result);

echo '<table align="center" border="3" BGCOLOR="white">';
echo "<tr style = 'background-color : #028aa9'>";
    echo "<td>ID</td>";
    echo "<td>Type Activite</td>";
    echo "<td>Description</td>";
    echo "<td>Date</td>";
    echo "<td>heureDebut</td>";
    echo "<td>heureFin</td>";

    echo "<td>Nombre Medecin Actuel</td>";
    
    echo "<td>Rejoindre ?</td>";
echo "</tr>";


while($ligne)
{
    $orderdate = explode('-', $ligne["date_debut"]);
    $year = $orderdate[0];
    $month   = $orderdate[1];
    $day  = $orderdate[2];


    $timestamp = mktime(0, 0, 0, $month, $day, $year); //Donne le timestamp correspondant à cette date
    
    $joursemaine = $dayToJour[date('D', $timestamp)]; //Ecrira les 3 premières lettres du jour en anglais, dans ton cas cela écrire Tue, si tu veux afficher Mardi il suffira juste alors de faire un tableau associatif, pareil si tu veux afficher 2.
    $dateJMA = $day."/".$month."/".$year;
    
    echo"<tr>";
        $num=$ligne['Id_ACTIVITE'];
        echo"<td>".$ligne['Id_ACTIVITE']."</td>";
        echo"<td>".$ligne['Id_TYPE_ACTIVITE']."</td>";
        echo"<td>".$ligne['description']."</td>";
        echo"<td>".$joursemaine." ".$dateJMA."</td>";
        echo"<td>".$ligne['heure_debut'].":00</td>";
        echo"<td>".$ligne['heure_fin'].":00</td>";
        
        echo"<td>".$ligne['nombreMedecinActuel']."</td>";
        echo"<td> <a href=joinActivite2.php?id=$num><button >JOIN</button></a></td>";
        
    echo"</tr>";

    $ligne = mysqli_fetch_assoc($result);
    
    
}
	
	echo"</table>";


/*Libération des résultats*/
mysqli_free_result($result);

mysqli_close($link); 

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
	<FORM ACTION="mesActivites.php">
    			<INPUT TYPE="SUBMIT" VALUE="Voir ses Activités" style="width: 200px; height: 40px;">
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