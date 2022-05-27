<?php
	include('connexion.php');
    
    if(isset($_SESSION['login']) && isset($_SESSION['ACCESS']))
	{
        $idMed = $_SESSION['idMedecin'];
		if($_SESSION['ACCESS'] != "CHANGE"){
			header('location: Accueil.php');
		}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        @import URL(css/style.css);
    </style>
    <title>PREMIERE CONNEXION</title>
</head>
<body style = "text-align: center">
<H3>Changer Mot de Passe</H3>
    <FORM METHOD="POST">
	<table style = "margin: auto; border: 0">
	

    <tr>
	<td>Adresse E-Mail :</td>
	<td><input type="email" name="mail" id = "mail" placeholder="example@mail.com" required><br></br></td>
	</tr>


	<tr>
	<td>Nouveau Mot de Passe :</td>
	<td><input type="password" name="newpass" id = "newpass" minlength="6" placeholder="let empty to not change" required><br></br></td>
	</tr>
	
	<tr>
	<td>Confirmation Mot de Passe :</td>
	<td><input type="password" name="confirm" id = "confirm" minlength="6"  required><br></br></td>
	</tr>

	</table>


	<br><br>
    <input type="submit" name="changeMdp" id="changeMdp" value="Changer Mot de passe" >
	</form>

        <script type="text/javascript">
            var password = document.getElementById("newpass"), confirm_password = document.getElementById("confirm");

            function validatePassword(){
                if(password.value != confirm_password.value) {
                    confirm_password.setCustomValidity("Mot de Passe différent");
                } else {
                    confirm_password.setCustomValidity('');
                }
                }

            password.onchange = validatePassword;
            confirm_password.onkeyup = validatePassword;
        </script>
</body>
</html>

<?php
if(isset($_POST['changeMdp'])){
    $mail = $_POST['mail'];
    $newpass = $_POST['newpass'];
    $confirm = $_POST['confirm'];

    if($newpass == $confirm){

		if(!empty($newpass)){

            $options = ['cost' =>12];
            $hashpass = password_hash($newpass, PASSWORD_BCRYPT, $options);
    
    
        $sqlmdp = "UPDATE `medecin` SET `mail` = '$mail', `mdp` = '$hashpass' WHERE `medecin`.`idMedecin` = '$idMed'";
        $req= mysqli_query($db,$sqlmdp)or die(mysqli_connect_error());
        header('refresh:1;url=deco.php');
        echo 'Mot de passe Modifié avec Succès...';
            }
        }
    
}
}
?>