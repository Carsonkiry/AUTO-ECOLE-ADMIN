<?php 
 session_start();
		$modele = "";
		$annee = "";
		$immatriculation = "";
		$kilometrage = "";
		$id = 0;
		$edit_state = false;
		

	$db = mysqli_connect('localhost', 'root', '', 'inscription_candidat');

	if (isset($_POST['save'])) {
		$modele = $_POST['modele'];
		$annee = $_POST['annee'];
		$immatriculation = $_POST['immatriculation'];
		$kilometrage = $_POST['kilometrage'];

		$query = "INSERT INTO voiture (modele, annee,immatriculation,kilometrage) VALUES ('$modele', '$annee' , '$immatriculation'  , '$kilometrage')"; 
		mysqli_query($db, $query);
		$_SESSION['msg'] = "Champs ajouté";
		header('location: voiture1.php');	
	
	}
	


	if (isset($_POST['update'])) {
		$modele = mysql_real_escape_string($_POST['modele']);
		$annee = mysql_real_escape_string($_POST['annee']);
		$immatriculation = mysql_real_escape_string($_POST['immatriculation']);
		$kilometrage = mysql_real_escape_string($_POST['kilometrage']);
		$id = mysql_real_escape_string($_POST['id']);


		mysqli_query($db, "UPDATE voiture SET modele='$modele', annee='$annee', immatriculation='$immatriculation', kilometrage='$kilometrage'                                         WHERE id=$id");
	    $_SESSION['msg'] = "Address updated"; 
	    header('location: voiture1.php');





   }


if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM voiture WHERE id=$id");
	$_SESSION['msg'] = "Champs suppimer"; 
	header('location: voiture1.php');
}

$results = mysqli_query($db, "SELECT * FROM voiture");
	

?>



 


