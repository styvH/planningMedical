
<?php
include ('connexion.php');
if($_SESSION['ACCESS'] == "Med"){
    header("Location: MenuRedirect.php");
}
else{
if(isset($_POST['formid']))
	{


        $dayToJour = array(
            "Mon" => "Lundi",
            "Tue" => "Mardi",
            "Wed" => "Mercredi",
            "Thu" => "Jeudi",
            "Fri" => "Vendredi",
            "Sat" => "Samedi",
            "Sun" => "Dimanche",
        );

$desc= $_POST['desc'];
$heureDeb = $_POST['heureDeb'];
$heureFin= $_POST['heureFin'];




$journee = $_POST['dateDeb'];


$orderdate = explode('-', $journee);
$year = $orderdate[0];
$month   = $orderdate[1];
$day  = $orderdate[2];


$timestamp = mktime(0, 0, 0, $month, $day, $year); //Donne le timestamp correspondant à cette date
 
$joursemaine = $dayToJour[date('D', $timestamp)]; //Ecrira les 3 premières lettres du jour en anglais, dans ton cas cela écrire Tue, si tu veux afficher Mardi il suffira juste alors de faire un tableau associatif, pareil si tu veux afficher 2.




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


$db=mysqli_connect("localhost","root","","planning_medical");


$sqlJour="INSERT INTO journee VALUES(NULL, '$joursemaine', '$day', '$month', '$year')"or die(mysqli_connect_error());

$req= mysqli_query($db,$sqlJour)or die(mysqli_connect_error());

$idjournee = $db->insert_id;

$sql="INSERT INTO activite VALUES(NULL, '$desc', '$heureDeb', '$heureFin', '$idjournee', '0', '$renouv', '$urgent', NULL, NULL, '$type')"or die(mysqli_connect_error());

$req= mysqli_query($db,$sql)or die(mysqli_connect_error());

header('Location: consulterActivite.php');
}


else{
	header('Location: ajoutActivite.php');
	
}
}
?>