<?php

$num=$_GET['id'];

include ("connexion.php");
// Note : Ajouter Message de Validation sur cette Page! 
$sql="delete from type_activite where Id_TYPE_ACTIVITE='$num'";

$db = mysqli_connect("localhost", "root","", "planning_medical");
$sql1=mysqli_query($db,$sql);


header('Location: consulterTypeActivite.php');




?>