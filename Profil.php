<?php
	include('connexion.php');
    $idMed = $_SESSION['idMedecin'];
    $sqlInfos = "SELECT * FROM medecin WHERE idMedecin = $idMed";
    $result=mysqli_query($db,$sqlInfos);   
    $resultat = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<style type="text/css">

	@import URL(css/style.css);

</style>
<TITLE>INFOS</TITLE>
</HEAD>

<BODY>
<nav class ="cart">
		<ul>

            <li class="start">
				
				<a href="menuRedirect.php">Menu</a>
				
			</li>

			<li class="start">
				
				<a href="Profil.php">Profil</a>
				
			</li>
			<li class="start">

				<a href="support">Support</a>

			</li>
		</ul>
	</nav>
<center><H3>Vos Informations</H3></center>
<br>
<section class="container">
    <section class="col1">

<FORM METHOD="POST">
	<table align="center" border="0">
	
	
	<tr>
	<td>Nom :</td>
	<td><input type="text" name="nom" id = "nom" value = '<?php echo $resultat['nom']; ?>'><br></br></td>
	</tr>
	
	<tr>
	<td>Prenom :</td>
	<td><input type="text" name="prenom" id = "prenom" value = '<?php echo $resultat['prenom']; ?>' ><br></br></td>
	</tr>

	<tr>
	<td>Coordonnées :</td>
	<td><input type="text" name="tel" id = "tel" value = '<?php echo $resultat['coordonnees']; ?>'><br></br></td>
	</tr>
	
	<tr>
	<td>Mail :</td>
	<td><input type="email" name="mail" id = "mail" value = '<?php echo $resultat['mail']; ?>'><br></br></td>
	</tr>

    <tr>
	<td>Adresse :</td>
	<td><input type="text" name="adresse" id = "adresse" value = '<?php echo $resultat['adresse']; ?>'><br></br></td>
	</tr>
	
	<tr>
	<td>Nombre Minimum Garde:</td>
	<td>
	<select type="text" name="nbMin" id = "nbMin">

	
	<?php
		for($i=0;$i<=10;$i++){
            if($resultat['nombreMinimumGarde'] == $i){
                echo "<option value='$i' selected>$i</option>";
            }else{
                echo "<option value='$i'>$i</option>";
            }
			
		}
	?>
		
		<br></br></td>
	
	</select>
	</tr>

    <tr>
	<td>Nombre Maximum Garde:</td>
	<td>
	<select type="text" name="nbMax" id = "nbMax">

	
	<?php
		for($i=0;$i<=10;$i++){
            if($resultat['nombreMaximumGarde'] == $i){
                echo "<option value='$i' selected>$i</option>";
            }else{
                echo "<option value='$i'>$i</option>";
            }
			
		}
	?>
		
		<br></br></td>
	
	</select>
	</tr>

	</table>


	<br><br>
	<center><input type="submit" name="updateInfos" id="updateInfos" value="Enregistrer" ></center>
		</form>
        </section>
    <section class="col2">
    <center><H3>Changer Mot de Passe</H3></center>
    <FORM METHOD="POST">
	<table align="center" border="0">
	
	
	<tr>
	<td>Ancien Mot de Passe :</td>
	<td><input type="password" name="expass" id = "expass"><br></br></td>
	</tr>

	<tr>
	<td>Nouveau Mot de Passe :</td>
	<td><input type="password" name="newpass" id = "newpass" placeholder="let empty to not change"><br></br></td>
	</tr>
	
	<tr>
	<td>Confirmation Mot de Passe :</td>
	<td><input type="password" name="confirm" id = "confirm"><br></br></td>
	</tr>

	</table>


	<br><br>
	<center><input type="submit" name="changeMdp" id="changeMdp" value="Changer Mot de passe" ></center>
		</form>

    </section>
</section>
		<br><br>
<center>
	<FORM ACTION="menuRedirect.php">
    			<INPUT TYPE="SUBMIT" VALUE="Retour Menu">
  				</FORM>
</center>	


</BODY>

</HTML>

<?php

if(isset($_POST['updateInfos'])){

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $tel = $_POST['tel'];
    $mail = $_POST['mail'];
    $adresse = $_POST['adresse'];
    $nbMin = $_POST['nbMin'];
    $nbMax = $_POST['nbMax'];


    $sql = "UPDATE `medecin` SET `nom` = '$nom', `prenom` = '$prenom', `coordonnees` = '$tel', `mail` = '$mail', `adresse` = '$adresse', `nombreMinimumGarde` = '$nbMin', `nombreMaximumGarde` = '$nbMax' WHERE `medecin`.`idMedecin` = $idMed";
    $req= mysqli_query($db,$sql)or die(mysqli_connect_error());
    header("Location: Profil.php");
}

if(isset($_POST['changeMdp'])){
    $expass = $_POST['expass'];
    $newpass = $_POST['newpass'];
    $confirm = $_POST['confirm'];

    $sql= "SELECT * from medecin WHERE `medecin`.`idMedecin` = $idMed";
 
    $result=mysqli_query($db,$sql);   
    $resultat = mysqli_fetch_assoc($result);

    if($expass == $resultat['mdp'] || password_verify($expass, $resultat['mdp'])){
        if($newpass == $confirm){
            
			if(!empty($newpass)){

                $options = ['cost' =>12];
                $hashpass = password_hash($newpass, PASSWORD_BCRYPT, $options);
    
    
            $sqlmdp = "UPDATE `medecin` SET `mdp` = '$hashpass' WHERE `medecin`.`idMedecin` = '$idMed'";
            $req= mysqli_query($db,$sqlmdp)or die(mysqli_connect_error());
            header('refresh:1;url=deco.php');
            echo 'Mot de passe Modifié avec Succès...';
            }
        }
    }
}

?>
