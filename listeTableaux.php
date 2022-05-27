<?php
	include('connexion.php');
	if(isset($_SESSION['login']) && isset($_SESSION['ACCESS']))
	{



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        @import URL(css/style.css);
    </style>
    <title>Tableaux</title>
</head>
<body style = 'text-align:center'>

    <h2>
        Liste des tableaux téléchargeables actuels
    </h2>
    <fieldset style = 'display: block; width: 50%; margin:auto'>
    <h3>
        Liste des Secteurs
    </h3>
    <a href="downloadSecteur.php?name=listeSecteurs">
    	<button style="width: 200px; height: 40px; background-color:aquamarine">Télecharger Liste des Secteurs</button>
	</a>

<h3>
        Liste des  Type Activités
    </h3>
	<a href="downloadTypeAct.php?name=listeTypesActivite">
    	<button style="width: 200px; height: 40px; background-color:aquamarine">Télecharger Liste des Types d'Activités</button>
	</a>

    <h3>
        Liste des Gardes
    </h3>
    <a href="downloadGarde.php?name=listeGardes">
    	<button style="width: 200px; height: 40px; background-color:aquamarine">Télecharger Liste des Gardes</button>
	</a>
</fieldset>


    </br></br>
    <FORM ACTION="menuRedirect.php">
        <INPUT TYPE="SUBMIT" VALUE="Retour Menu" style="width: 200px; height: 40px;">
    </FORM>

</body>
</html>

<?php	
	}
	else
		header('Location: Accueil.php');
?>