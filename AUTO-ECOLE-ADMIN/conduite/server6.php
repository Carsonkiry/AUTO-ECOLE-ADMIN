<?php 
 session_start();
		$adresse_con = "";
		$code_postal_con = "";
		$ville_con = "";
        $type_examen_con = "";
        $nom_candidat_con = "";
        $prenom_candidat_con = "";
        $heure_con = "";
		$id = 0;
		$edit_state = false;
		

	$db = mysqli_connect('localhost', 'root', '', 'inscription_candidat');

	if (isset($_POST['save'])) {
		$adresse_con = $_POST['adresse_con'];
		$code_postal_con = $_POST['code_postal_con'];
		$ville_con = $_POST['ville_con'];
        $type_examen_con = $_POST['type_examen_con'];
        $nom_candidat_con = $_POST['nom_candidat_con'];
        $prenom_candidat_con = $_POST['prenom_candidat_con'];
        $heure_con = $_POST['heure_con'];


		$query = "INSERT INTO conduite (adresse_con, code_postal_con,ville_con,type_examen_con,nom_candidat_con,prenom_candidat_con,heure_con)
         VALUES ('$adresse_con', '$code_postal_con' , '$ville_con'  , '$type_examen_con', '$nom_candidat_con', '$prenom_candidat_con', '$heure_con')"; 
		mysqli_query($db, $query);
		$_SESSION['msg'] = "Champs ajouté";
		header('location: conduite1.php');	
	
	}
	


	if (isset($_POST['update'])) {
		$adresse_con = mysql_real_escape_string($_POST['adresse_con']);
		$code_postal_con = mysql_real_escape_string($_POST['code_postal_con']);
		$ville_con = mysql_real_escape_string($_POST['ville_con']);
        $date_de_naissance = mysql_real_escape_string($_POST['type_examen_con']);
        $nom_candidat_con = mysql_real_escape_string($_POST['nom_candidat_con']);
        $prenom_candidat_con = mysql_real_escape_string($_POST['prenom_candidat_con']);
        $heure_con = mysql_real_escape_string($_POST['heure_con']);

        
		$id = mysql_real_escape_string($_POST['id']);


		mysqli_query($db, "UPDATE conduite SET adresse_con='$adresse_con', code_postal_con='$code_postal_con', ville_con='$ville_con', type_examen_con='$type_examen_con', nom_candidat_con='$nom_candidat_con',  
        prenom_candidat_con='$prenom_candidat_con', heure_con='$heure_con' WHERE id=$id");
	    $_SESSION['msg'] = "Address updated"; 
	    header('location: conduite1.php');





   }


if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM conduite WHERE id=$id");
	$_SESSION['msg'] = "Champs suppimer"; 
	header('location: conduite1.php');
}

$results = mysqli_query($db, "SELECT * FROM conduite");
	

?>



 


