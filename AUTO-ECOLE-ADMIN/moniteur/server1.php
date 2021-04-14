<?php 
 session_start();
		$nom = "";
		$prenom = "";
		$mail = "";
		$tel = "";
		$id = 0;
		$edit_state = false;
		

	$db = mysqli_connect('localhost', 'root', '', 'inscription_candidat');

	if (isset($_POST['save'])) {
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$mail = $_POST['mail'];
		$tel = $_POST['tel'];

		$query = "INSERT INTO moniteur (nom, prenom,mail,tel) VALUES ('$nom', '$prenom' , '$mail'  , '$tel')"; 
		mysqli_query($db, $query);
		$_SESSION['msg'] = "Champs ajouté";
		header('location: index1.php');	
	
	}
	


	if (isset($_POST['update'])) {
		$nom = mysql_real_escape_string($_POST['nom']);
		$prenom = mysql_real_escape_string($_POST['prenom']);
		$mail = mysql_real_escape_string($_POST['mail']);
		$tel = mysql_real_escape_string($_POST['tel']);
		$id = mysql_real_escape_string($_POST['id']);


		mysqli_query($db, "UPDATE moniteur SET nom='$nom', prenom='$prenom', mail='$mail', tel='$tel' WHERE id=$id");
	    $_SESSION['msg'] = "Champs modifié"; 
	    header('location: index1.php');





   }


if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM moniteur WHERE id=$id");
	$_SESSION['msg'] = "Champs suppimer"; 
	header('location: index1.php');
}

$results = mysqli_query($db, "SELECT * FROM moniteur");
	

?>



 


