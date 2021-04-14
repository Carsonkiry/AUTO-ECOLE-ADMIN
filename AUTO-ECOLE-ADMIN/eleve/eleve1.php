<?php include('server2.php'); 


if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
    $edit_state = true;
	$rec = mysqli_query($db, "SELECT * FROM utilisateurs WHERE id=$id");
    $record = mysqli_fetch_array($rec);
	$nom = $record['nom'];
	$prenom = $record['prenom'];
	$sexe = $record['sexe'];
    $date_de_naissance = $record['date_de_naissance'];
    $adresse = $record['adresse'];
    $code_postal = $record['code_postal'];
    $ville = $record['ville'];
    $telephone = $record['telephone'];
    $adresse_mail = $record['adresse_mail'];
	$etablissement = $record['etablissement'];
	$formule = $record['formule'];

	$id = $record['id'];

}



?>
<html>

<head>
	<title>Eleve</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="logo1.png">
</head>
<body>
	<center>
<div class="overlay">
            
            <div class="overlay__content">
			    <a href="../accueil.php" class="btn btn-primary">Accueil</a>
                <a href="../eleve/eleve1.php" class="btn btn-primary">Inscrire un eleve</a>
                <a href="../moniteur/index1.php"class="btn btn-primary">Ajouter un moniteur</a>
                <a href="../planning/planning1.php" class="btn btn-primary">Planning</a>  
                <a href="../code/code1.php" class="btn btn-primary">Examen Code</a>
                <a href="../conduite/conduite1.php" class="btn btn-primary">Examen conduite</a>
                <a href="../voiture/voiture1.php" class="btn btn-primary">Voiture</a>
				<a href="../moto/moto1.php" class="btn btn-primary">Moto</a>
				
            </div>
        </div>
 <strong><h1> Liste des élèves </h1></srong> </center>

<?php if (isset($_SESSION['msg'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['msg']; 
			unset($_SESSION['msg']);
		?>
	</div>
<?php endif ?>


<table>
	<thead>
		<tr>
			<th>Nom</th>
			<th>Prenom</th>
			<th>Sexe</th>
			<th>Date de naissance</th>
            <th>Adresse</th>
            <th>Code postal</th>
            <th>Ville</th>
            <th>Telephone</th>
            <th>Adresse mail</th>
            <th>Etablissement</th>
			<th>Formule</th>
			
		</tr>
	</thead>
	<tbody> 
	<?php while ($row = mysqli_fetch_array($results)) { ?>
	<tr>
	<td><?php echo $row['nom']; ?> </td>
	<td><?php echo $row['prenom']; ?> </td>
	<td><?php echo $row['sexe']; ?> </td>
	<td><?php echo $row['date_de_naissance']; ?> </td>
    <td><?php echo $row['adresse']; ?> </td>
    <td><?php echo $row['code_postal']; ?> </td>
    <td><?php echo $row['ville']; ?> </td>
    <td><?php echo $row['telephone']; ?> </td>
    <td><?php echo $row['adresse_mail']; ?> </td>
    <td><?php echo $row['etablissement']; ?> </td>
	<td><?php echo $row['formule']; ?> </td>
	<td>
	    <a class="edit_btn" href="eleve1.php?edit=<?php echo $row['id']; ?>">Modifier</a>
	</td>
	<td>
	<a  class="del_btn" href="server2.php?del=<?php echo $row['id']; ?>">Supprimer</a>
	</td>
	</tr>
<?php } ?>

</tbody>
</table>

<form method="post" action="server2.php" >
<imput type="hidden" name="id" value="<?php echo $id; ?>"> 
		<div class="input-group">
			<label>Nom </label>
			<input type="text" required="required" name="nom" value="<?php echo $nom; ?>">
		</div>



		<div class="input-group">
			<label>Prenom</label>
			<input type="text" required="required" name="prenom" value="<?php echo $prenom; ?>">
		</div>


		<div class="input-group">
			<label>Sexe</label>
			<input type="text" required="required" name="sexe" value="<?php echo $sexe; ?>">
		</div>

<div class="input-group">
			<label>Date de naissance</label>
			<input type="date" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}
" name="date_de_naissance" value="<?php echo $date_de_naissance; ?>">
		</div>


        <div class="input-group">
			<label>Adresse</label>
			<input type="text" required="required" name="adresse" value="<?php echo $adresse; ?>">
		</div>

        <div class="input-group">
			<label>Code Postal</label>
			<input type="text" required="required" name="code_postal" value="<?php echo $code_postal; ?>">
		</div>
        <div class="input-group">
			<label>Ville</label>
			<input type="text" required="required" name="ville" value="<?php echo $ville; ?>">
		</div>
        <div class="input-group">
			<label>Telephone</label>
			<input type="text"  name="telephone" required="required" value="<?php echo $telephone; ?>">
		</div>

        <div class="input-group">
			<label>Adresse mail</label>
			<input type="email" required="required" name="adresse_mail" value="<?php echo $adresse_mail; ?>">
		</div>

        <div class="input-group">
			<label>Etablissement</label>
			<input type="text" name="etablissement" value="<?php echo $etablissement; ?>">
		</div>

		
        <div class="input-group">
			<label>Formule</label>
			<input type="text" required="required" name="formule" value="<?php echo $formule; ?>">
		</div>





		<div class="input-group">
		<?php if ($edit_state == false): ?>
			<button type="submit" name="save" class="btn"  >Valider</button>

			<?php else: ?>
				<button type="submit" name="update" class="btn">Modifier</button>
				<?php endif ?>





		</div>
	</form>






</body>
</html>