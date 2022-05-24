<?php

$num=$_GET['id'];

include ("connexion.php");
// Note : Ajouter Message de Validation sur cette Page! 
$sql="delete from activite where Id_ACTIVITE='$num'";

$db = mysqli_connect("localhost", "root","", "planning_medical");
$sql1=mysqli_query($db,$sql);


header('Location: listeActivites.php');




?>