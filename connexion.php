<?php

session_start ();

	//Connexion au serveur sous Windows
 	define('HOST','localhost');
    define('nom_base','planning_medical');
    define('USER','root');
    define('PASS','');



    try{
        $db = mysqli_connect("localhost", "root","", "planning_medical");
    } catch(PDOException $e){
        echo $e; 
        echo"La base de données n'est pas disponible merci de réssayer";
    }
    if(isset($_SESSION['ACCES'])){
        echo '<div style = "text-align: right">';
        echo 	'<FORM ACTION="deco.php">';
        echo    '<INPUT TYPE="SUBMIT" VALUE="   Déconnexion   "">';
        echo    '</FORM>';
        echo'</div>';
        $db = mysqli_connect("localhost", "root","", "planning_medical");
    }
    else{
        header('refresh:1;url=Accueil.php');
    	echo 'Veuillez vous connecter...';
    }



    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 300)) {
    	header('refresh:1;url=deco.php');
    	echo '<h2>Session Expirée</h2>';
    	exit;
}
if (isset($_SESSION['LAST_ACTIVITY']))
{
$_SESSION['LAST_ACTIVITY'] = time();
}


/* 
	$req= mysql_query("select * from auth where Auth_Login= '".$_SESSION['Auth_Login']."' ") or die("Oups !");
	$info= mysql_fetch_array($req);

	
	//Connexion au serveur sous Mac avec MAMP

	$user = 'root';
	$password = 'root';
	$db = 'gsb';
	$host = 'localhost';
	$port = 8889;
	
	$link = mysql_connect(
    "$host:$port", 
    $user, 
    $password
	) or die("erreur de connexion au serveur");
	
	$db_selected = mysql_select_db(
   $db, 
   $link
   ) or die("erreur de connexion a la BDD");
 */
?>