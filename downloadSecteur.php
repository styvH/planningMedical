<?php 
header("Content-type: application/vdn.ms-excel");
header("Content-Disposition: attachment; filename=listeSecteurs.com.xls");

 $link=mysqli_connect("localhost","root","","planning_medical");

$sql= "SELECT * FROM secteur ";
 
$result=mysqli_query($link,$sql);   
$ligne = mysqli_fetch_assoc($result);
	echo '<table align="center" border="3" BGCOLOR="white">';
	echo "<tr style = 'background-color : #028aa9'>";
		echo "<td>ID Secteur</td>";
		echo "<td>Nom Secteur</td>";
        echo "<td>Nombre Medecin Requis</td>";
	echo "</tr>";
	

	while($ligne)
	{
		
		
		echo"<tr>";
			$num=$ligne['Id_SECTEUR'];
            echo"<td>".$ligne['Id_SECTEUR']."</td>";
			echo"<td>".$ligne['nomSecteur']."</td>";
			echo"<td>".$ligne['nombreMedecinRequis']."</td>";
			
		echo"</tr>";

		$ligne = mysqli_fetch_assoc($result);
		
		
	}
	
	echo"</table>";





/*Libération des résultats*/
mysqli_free_result($result);

mysqli_close($link); 





	echo"</table>";
?>