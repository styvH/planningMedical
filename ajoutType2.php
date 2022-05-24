
<?php
include ('connexion.php');
if($_SESSION['ACCESS'] == "Med"){
    header("Location: MenuRedirect.php");
}
else{
if(isset($_POST['formid']))
	{

$id= $_POST['idType'];
$abrev= $_POST['abrev'];
$nom = $_POST['nom'];
$desc = $_POST['desc'];




$db=mysqli_connect("localhost","root","","planning_medical");


$sql="INSERT INTO type_activite VALUES('$id', '$abrev', '$nom', '$desc')"or die(mysqli_connect_error());

$req= mysqli_query($db,$sql)or die(mysqli_connect_error());


header('Location: consulterTypeActivite.php');
}
else{
	header('Location: ajoutTypeActivite.php');
	
}
}
?>