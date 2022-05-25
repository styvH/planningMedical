<?php
include ("connexion.php");
$idMedecin = $_SESSION['idMedecin'];
$idActivite=$_GET['id'];


// Note : Ajouter Message de Validation sur cette Page! 
$sql="INSERT INTO effectuer VALUES ('$idMedecin', '$idActivite',NULL)";
$nbMed = "SELECT COUNT(*) AS nbMED FROM effectuer  WHERE Id_Activite = '$idActivite' ";



$db = mysqli_connect("localhost", "root","", "planning_medical");


$sql1= mysqli_query($db,$sql);

$sqlnb= mysqli_query($db,$nbMed);

$row = mysqli_fetch_assoc(($sqlnb));
$nbMed = $row['nbMED'];
$updateNbMed ="UPDATE `activite` SET `nombreMedecinActuel` = $nbMed WHERE `activite`.`Id_ACTIVITE` = $idActivite";
$sqlupdate = mysqli_query($db,$updateNbMed);

header('Location: joinActivite.php');

?>