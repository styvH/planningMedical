
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php
include('excelWriterDownload.php');

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
	echo "</tr>";
	

	while($ligne)
	{
		
		
		echo"<tr>";
			$num=$ligne['Id_TYPE_ACTIVITE'];
            echo"<td>".$ligne['Id_TYPE_ACTIVITE']."</td>";
            echo"<td>".$ligne['abreviation']."</td>";
			echo"<td>".$ligne['libelle_type']."</td>";
			echo"<td>".$ligne['description_type']."</td>";
			
		echo"</tr>";

		$ligne = mysqli_fetch_assoc($result);
		
		
	}
	
	echo"</table>";
?>
</body>
</html>
