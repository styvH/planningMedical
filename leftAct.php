<?php
include ("connexion.php");
$idMedecin = $_SESSION['idMedecin'];
$idActivite=$_GET['id'];


// Note : Ajouter Message de Validation sur cette Page! 
$sql="delete from effectuer where Id_ACTIVITE= $idActivite AND Id_Medecin = $idMedecin";
$nbMed = "SELECT COUNT(*) AS nbMED FROM effectuer  WHERE Id_Activite = '$idActivite' ";



$db = mysqli_connect("localhost", "root","", "planning_medical");


$sql1= mysqli_query($db,$sql);

$sqlnb= mysqli_query($db,$nbMed);

$row = mysqli_fetch_assoc(($sqlnb));
$nbMed = $row['nbMED'];
$updateNbMed ="UPDATE `activite` SET `nombreMedecinActuel` = $nbMed WHERE `activite`.`Id_ACTIVITE` = $idActivite";
$sqlupdate = mysqli_query($db,$updateNbMed);

header('Location: mesActivites.php');

?>