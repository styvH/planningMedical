<?php
	include('connexion.php');
	if(isset($_SESSION['login']) && isset($_SESSION['ACCESS']))
	{
		switch($_SESSION['ACCESS']){

					case "Med":
					header('location: menuMed.php');
					break;
					case "Resp" :
					header('location: menuResp.php');
					break;

				}

	}
	else
		header('Location: Accueil.php');
?>
		
		
