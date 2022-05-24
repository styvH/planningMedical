
<?php
include ('connexion.php');
if($_SESSION['ACCESS'] == "Med"){
    header("Location: MenuRedirect.php");
}
else{
if(isset($_POST['formid']))
	{

$desc= $_POST['desc'];
$dateDeb = $_POST['dateDeb'];
$dateDeb = str_replace("T"," ",$dateDeb); // Changement de format (Lettre T entre date et heure empêchant l'entrée dans la base)
$dateFin= $_POST['dateFin'];
$dateFin = str_replace("T"," ",$dateFin); // Changement de format (Lettre T entre date et heure empêchant l'entrée dans la base)
if(isset($_POST['renouv'])){
    $renouv= 1;
}
else{
    $renouv = 0;
}

if(isset($_POST['urgent'])){
    $urgent= 1;
}
else{
    $urgent = 0;
}
$type= $_POST['type']; 


// echo $id.$desc.$dateDeb.$dateFin.$renouv."urgent ? : ".$urgent.$secteur.$type;


$db=mysqli_connect("localhost","root","","planning_medical");


$sql="INSERT INTO activite VALUES(NULL, '$desc', '$dateDeb', '$dateFin', '0', '$renouv', '$urgent', NULL, NULL, '$type')"or die(mysqli_connect_error());

$req= mysqli_query($db,$sql)or die(mysqli_connect_error());

header('Location: consulterActivite.php');
}
else{
	header('Location: ajoutActivite.php');
	
}
}
?>