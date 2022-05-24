
<?php
include ('connexion.php');
if($_SESSION['ACCESS'] == "Med"){
    header("Location: MenuRedirect.php");
}
else{
if(isset($_POST['formid']))
	{

$id= $_POST['idSecteur'];
$nom= $_POST['nom'];
$nb = $_POST['nombre'];




$db=mysqli_connect("localhost","root","","planning_medical");


$sql="INSERT INTO secteur VALUES('$id', '$nom', '$nb')"or die(mysqli_connect_error());

$req= mysqli_query($db,$sql)or die(mysqli_connect_error());


header('Location: consulterSecteurs.php');
}
else{
	header('Location: ajoutSecteur.php');
	
}
}
?>