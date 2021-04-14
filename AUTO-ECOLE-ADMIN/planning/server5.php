<?php 
 session_start();
		$nom_candidat = "";
		$prenom_candidat = "";
		$intitule_lecon = "";
		$datep = "";
		$heure = "";
		$heuref = "";
		$id = 0;
		$edit_state = false;
		

	$db = mysqli_connect('localhost', 'root', '', 'inscription_candidat');

	if (isset($_POST['save'])) {
		$nom_candidat = $_POST['nom_candidat'];
		$prenom_candidat = $_POST['prenom_candidat'];
		$intitule_lecon = $_POST['intitule_lecon'];
		$datep = $_POST['datep'];
		$heure = $_POST['heure'];
		$heuref = $_POST['heuref'];

		$query = "INSERT INTO planning (nom_candidat, prenom_candidat,intitule_lecon,datep ,heure,heuref) VALUES ('$nom_candidat', '$prenom_candidat' , '$intitule_lecon ','$datep'  , '$heure','$heuref')"; 
		mysqli_query($db, $query);
		$_SESSION['msg'] = "Champs ajouté";
		header('location: planning1.php');	
	
	}
	


	if (isset($_POST['update'])) {
		$nom_candidat = mysql_real_escape_string($_POST['nom_candidat']);
		$prenom_candidat = mysql_real_escape_string($_POST['prenom_candidat']);
		$intitule_lecon  = mysql_real_escape_string($_POST['intitule_lecon ']);
		$datep  = mysql_real_escape_string($_POST['datep']);
		$heure = mysql_real_escape_string($_POST['heure']);
		$heuref = mysql_real_escape_string($_POST['heuref']);
		$id = mysql_real_escape_string($_POST['id']);


		mysqli_query($db, "UPDATE planning SET nom_candidat='$nom_candidat', prenom_candidat='$prenom_candidat', intitule_lecon ='$intitule_lecon ',datep='$datep' , heure='$heure', heuref='$heuref', WHERE id=$id");
	    $_SESSION['msg'] = "Champs modifié"; 
	    header('location: planning1.php');





   }
 

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM planning WHERE id=$id");
	$_SESSION['msg'] = "Champs supprimé"; 
	header('location: planning1.php');
}

$results = mysqli_query($db, "SELECT * FROM planning");
	

?>



 


