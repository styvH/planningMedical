<!DOCTYPE html>
<html>
<head>
<title>Accueil</title>
<meta charset="utf-8" />

<style type="text/css">
	@import URL(css/style.css);
</style>
</head>
<body style = "text-align: center">


<h1>Acceuil</h1>
	<br>
	<br>
	<br>
	<br>

		<form method="post">
		
		
		<table style = 'margin :auto; border: 0'>
			<tr>
				<td>Login : </td>
				<td><input type="text" name="login" cols="30" size="30" required></td>
			</tr>

			<tr>
			<td>Password : </td>
			<td><input type="Password" name="password" cols="30" size="30" required></td>
			</tr>
		</table>
		
	<br>

	<?php



	if(isset($_POST['submit']))
	{
		$login= $_POST['login'];
		$password= $_POST['password'];
		

$db=mysqli_connect("localhost","root","","planning_medical");
if (!$db) {
die('Echec de connexion au serveur de base de données:'.mysqli_connect_errno());}

$sql= "SELECT * from medecin where login = '$login'";
 
$result=mysqli_query($db,$sql);   
$resultat = mysqli_fetch_assoc($result);

	if(isset($resultat) && strtoupper($login)  == strtoupper($resultat['login'])) //stroupper pour tout mettre en majuscule soit à la même hauteur pour éviter les erreurs de majuscule	
		{
			if($password == $resultat['mdp']){ //Premiere Authentification
				include 'connexion.php';
				$_SESSION['idMedecin'] = $resultat['idMedecin'];
				$_SESSION['login']= $login;
				$_SESSION['LAST_ACTIVITY'] = time();
				$_SESSION['ACCESS'] = "CHANGE";
				header('location: menuRedirect.php');
			}
		
			else if(password_verify($password, $resultat['mdp']))
			{
				include 'connexion.php';
				$_SESSION['idMedecin'] = $resultat['idMedecin'];
				$_SESSION['login']= $login;
				$_SESSION['LAST_ACTIVITY'] = time();
				$_SESSION['ACCESS'] = "Med";


				$id = $resultat['idMedecin'];

				$sqlResp= "SELECT * from responsable_planning";
				$resultResp=mysqli_query($db,$sqlResp);
				while($resultatResp = mysqli_fetch_assoc($resultResp)){

					

					if($id == $resultatResp['idMedecin']){
						$_SESSION['ACCESS'] = "Resp";
					}
				}
				mysqli_free_result($result);
				mysqli_free_result($resultResp);
				header('location: menuRedirect.php');

				


				
				
			}
			else
			{
				echo "<Center><font color = 'red'>Erreur Authentification : Mot de Passe Incorrecte </font></Center> <br>";
			}
		} 
		else
			{
				echo "<Center><font color = 'red'>Erreur Authentification : Login non répertorié </font></Center> <br>";
			}

}
?>
	 <input type="submit" name = "submit" value="Connexion">
	</form>
	<footer>

</footer>

</body>	
</html>
	<p>
		Copyright &copy; HS_Prod - 2019-2021 - All Right Reserved
	</p>
</footer>

</body>	
</html>