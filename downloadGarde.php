
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php 
include('excelWriterDownload.php');

 $link=mysqli_connect("localhost","root","","planning_medical");

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
            
            
            echo"<td>".$joursemaine." ".$dateJMA."</td>";
            echo"<td>".$ligne['nom']." ".$ligne['prenom']."</td>";
            echo"<td>".$ligneastr['nom']." ".$ligneastr['prenom']."</td>";
           
            
        echo"</tr>";

        $ligne = mysqli_fetch_assoc($result);
        $ligneastr = mysqli_fetch_assoc($resultastr);
		
		
	}
	
	echo"</table>";





/*Libération des résultats*/
mysqli_free_result($result);

mysqli_close($link); 





	echo"</table>";
?>
</body>
</html>
