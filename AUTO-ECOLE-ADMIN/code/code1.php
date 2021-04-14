<?php include('server6.php'); 


if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
    $edit_state = true;
	$rec = mysqli_query($db, "SELECT * FROM code WHERE id=$id");
    $record = mysqli_fetch_array($rec);
	$adresse = $record['adresse'];
	$code_postal = $record['code_postal'];
    $ville = $record['ville'];
    $type_examen = $record['type_examen'];
    $nom_candidat = $record['nom_candidat'];
    $prenom_candidat = $record['prenom_candidat'];
    $heure = $record['heure'];
   

	$id = $record['id'];

}



?>
<html>
<head>
	<title>Code</title>
	<link rel="stylesheet" type="text/css" href="style6.css">
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
 
 <strong><h1> Examen du code </h1></srong> </center>

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
			<th>Adresse</th>
			<th>Code Postal</th>
			<th>Ville</th>
            <th>Examen</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Heure</th>
			<th colspan="7">Action</th>
		</tr>
	</thead>
	<tbody> 
	<?php while ($row = mysqli_fetch_array($results)) { ?>
	<tr>
	<td><?php echo $row['adresse']; ?> </td>
	<td><?php echo $row['code_postal']; ?> </td>
	<td><?php echo $row['ville']; ?> </td>
    <td><?php echo $row['type_examen']; ?> </td>
    <td><?php echo $row['nom_candidat']; ?> </td>
    <td><?php echo $row['prenom_candidat']; ?> </td>
    <td><?php echo $row['heure']; ?> </td>
	<td>
	    <a class="edit_btn" href="code1.php?edit=<?php echo $row['id']; ?>">Modifier</a>
	</td>
	<td>
	<a class="del_btn" href="server6.php?del=<?php echo $row['id']; ?>">Supprimer</a>
	</td>
	</tr>
<?php } ?>

</tbody>
</table>

<form method="post" action="server6.php" >
<imput type="hidden" name="id" value="<?php echo $id; ?>"> 
		<div class="input-group">
			<label>Adresse</label>
			<input type="text" required="required" name="adresse" value="<?php echo $adresse; ?>">
		</div>



		<div class="input-group">
			<label>Code postal</label>
			<input type="text" required="required" name="code_postal" value="<?php echo $code_postal; ?>">
		</div>


		<div class="input-group">
			<label>Ville</label>
			<input type="text" required="required" name="ville" value="<?php echo $ville; ?>">
		</div>

<div class="input-group">
			<label>Type examen</label>
			<input type="text" required="required" name="type_examen" value="<?php echo $type_examen; ?>">
        </div>
        

        <div class="input-group">
			<label>Nom du candidat</label>
			<input type="text" required="required" name="nom_candidat" value="<?php echo $nom_candidat; ?>">
		</div>


        <div class="input-group">
			<label>Prenom du candidat</label>
			<input type="text" required="required" name="prenom_candidat" value="<?php echo $prenom_candidat; ?>">
		</div>


        <div class="input-group">
			<label>Heure</label>
			<input type="time" required="required" name="heure" value="<?php echo $heure; ?>">
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