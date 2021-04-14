<?php 
 session_start();
		$nom = "";
		$prenom = "";
		$sexe = "";
        $date_de_naissance = "";
        $adresse = "";
        $code_postal = "";
        $ville = "";
        $telephone = "";
        $adresse_mail = "";
		$etablissement = "";
		$formule = "";
		$id = 0;
		$edit_state = false;
		

	$db = mysqli_connect('localhost', 'root', '', 'inscription_candidat');

	if (isset($_POST['save'])) {
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$sexe = $_POST['sexe'];
        $date_de_naissance = $_POST['date_de_naissance'];
        $adresse = $_POST['adresse'];
        $code_postal = $_POST['code_postal'];
        $ville = $_POST['ville'];
        $telephone = $_POST['telephone'];
        $adresse_mail = $_POST['adresse_mail'];
		$etablissement = $_POST['etablissement'];
		$formule = $_POST['formule'];

		$query = "INSERT INTO utilisateurs (nom, prenom,sexe,date_de_naissance,adresse,code_postal,ville,telephone,adresse_mail,etablissement,formule) VALUES ('$nom', '$prenom' , '$sexe'  , '$date_de_naissance', '$adresse', '$code_postal', '$ville', '$telephone', '$adresse_mail', '$etablissement', '$formule' )"; 
		mysqli_query($db, $query);
		$_SESSION['msg'] = "Champs ajouté";
		header('location: eleve1.php');	
	
	}
	


	if (isset($_POST['update'])) {
		$nom = mysql_real_escape_string($_POST['nom']);
		$prenom = mysql_real_escape_string($_POST['prenom']);
		$sexe = mysql_real_escape_string($_POST['sexe']);
        $date_de_naissance = mysql_real_escape_string($_POST['date_de_naissance']);
        $adresse = mysql_real_escape_string($_POST['adresse']);
        $code_postal = mysql_real_escape_string($_POST['code_postal']);
        $ville = mysql_real_escape_string($_POST['ville']);
        $telephone = mysql_real_escape_string($_POST['telephone']);
        $adresse_mail = mysql_real_escape_string($_POST['adresse_mail']);
		$etablissement = mysql_real_escape_string($_POST['etablissement']);
		$formule = mysql_real_escape_string($_POST['formule']);
        
		$id = mysql_real_escape_string($_POST['id']);


		mysqli_query($db, "UPDATE utilisateurs SET nom='$nom', prenom='$prenom', sexe='$sexe', date_de_naissance='$date_de_naissance', adresse='$adresse',  
        code_postal='$code_postal', ville='$ville', telephone='$telephone', adresse_mail='$adresse_mail', etablissement='$etablissement', formule='$formule'                                                 WHERE id=$id");
	    $_SESSION['msg'] = "Address updated"; 
	    header('location: eleve1.php');





   }


if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM utilisateurs WHERE id=$id");
	$_SESSION['msg'] = "Champs suppimer"; 
	header('location: eleve1.php');
}

$results = mysqli_query($db, "SELECT * FROM utilisateurs");
	

?>



 


