<?php
	include('connexion.php');
    $idMed = $_SESSION['idMedecin'];
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
<center><H3>Support</H3></center>
<br>

<center>
<FORM METHOD="POST">

	<td><textarea name="post" id = "post" rows="5" cols="33" placeholder="Quel est le problème ?" minlength="11" maxlength="200" required></textarea><br></br></td>
    <INPUT TYPE="SUBMIT" id='ask' name = 'ask' VALUE="Send Ticket">
    <br><br>
    <?php
if(isset($_POST['ask'])){

    $post = $_POST['post'];


		$sql = "INSERT INTO support VALUES (NULL, '$post', '$idMed', NULL)";
		$req= mysqli_query($db,$sql)or die(mysqli_connect_error());

header("refresh:3 ; url=support.php");
			echo "Votre demande à bien été transmise, coupon #".$db->insert_id;
    		echo " <br> Message : <br> <p>".$post."</p>";
			


}




?>

</FORM>
	<FORM ACTION="menuRedirect.php">
    	<INPUT TYPE="SUBMIT" VALUE="Retour Menu">
    </FORM>



</center>	
</BODY>

</HTML>


