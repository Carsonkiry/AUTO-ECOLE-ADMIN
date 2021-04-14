<?php 
 session_start();
		$adresse = "";
		$code_postal = "";
		$ville = "";
        $type_examen = "";
        $nom_candidat = "";
        $prenom_candidat = "";
        $heure = "";
		$id = 0;
		$edit_state = false;
		

	$db = mysqli_connect('localhost', 'root', '', 'inscription_candidat');

	if (isset($_POST['save'])) {
		$adresse = $_POST['adresse'];
		$code_postal = $_POST['code_postal'];
		$ville = $_POST['ville'];
        $type_examen = $_POST['type_examen'];
        $nom_candidat = $_POST['nom_candidat'];
        $prenom_candidat = $_POST['prenom_candidat'];
        $heure = $_POST['heure'];

		$query = "INSERT INTO code (adresse, code_postal,ville,type_examen,nom_candidat,prenom_candidat,heure) VALUES ('$adresse', '$code_postal' , '$ville'  , '$type_examen','$nom_candidat','$prenom_candidat','$heure' )"; 
		mysqli_query($db, $query);
		$_SESSION['msg'] = "Champs ajouté";
		header('location: code1.php');	
	
	}
	


	if (isset($_POST['update'])) {
		$adresse = mysql_real_escape_string($_POST['adresse']);
		$code_postal = mysql_real_escape_string($_POST['code_postal']);
		$ville = mysql_real_escape_string($_POST['ville']);
        $type_examen = mysql_real_escape_string($_POST['type_examen']);
        $nom_candidat = mysql_real_escape_string($_POST['nom_candidat']);
        $prenom_candidat = mysql_real_escape_string($_POST['prenom_candidat']);
        $heure = mysql_real_escape_string($_POST['heure']);
		$id = mysql_real_escape_string($_POST['id']);


		mysqli_query($db, "UPDATE code SET adresse='$adresse', code_postal='$code_postal', ville='$ville', type_examen='$type_examen',nom_candidat='$nom_candidat',prenom_candidat='$prenom_candidat', heure='$heure'                                          WHERE id=$id");
	    $_SESSION['msg'] = "Address updated"; 
	    header('location: code1.php');





   }


if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM code WHERE id=$id");
	$_SESSION['msg'] = "Champs suppimer"; 
	header('location: code1.php');
}

$results = mysqli_query($db, "SELECT * FROM code");
	

?>



 


