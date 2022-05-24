<?php

$db = mysqli_connect("localhost", "root","", "planning_medical");

$sql = "SELECT COUNT(*) AS nb FROM heure";
$result=mysqli_query($db,$sql);   
$ligne = mysqli_fetch_assoc($result);
$i = $ligne["nb"];

$sqlInsert="INSERT INTO heure VALUES(NULL)"or die(mysqli_connect_error());

echo '			<FORM METHOD = "POST">';
echo '<INPUT TYPE="SUBMIT" VALUE="     Remplir Heures     " name= "SUBMIT" id = "SUBMIT" style="width: 300px; height: 40px;">';
 echo" </FORM>" ;

if (isset($_POST["SUBMIT"])){
    $secure = 0;
    while($i < 23){

    $sql = "SELECT COUNT(*) AS nb FROM heure";
    $result=mysqli_query($db,$sql);   
    $ligne = mysqli_fetch_assoc($result);
    $i = $ligne["nb"];

    $req= mysqli_query($db,$sqlInsert)or die(mysqli_connect_error());
    $secure++;
    if($secure > 25){
        echo"infini";
        echo $i;
        break;
    }
    echo "Terminé";
}
}

?>
