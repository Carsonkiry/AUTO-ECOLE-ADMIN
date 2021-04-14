<?php include('server5.php'); 


if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
    $edit_state = true;
	$rec = mysqli_query($db, "SELECT * FROM planning WHERE id=$id");
    $record = mysqli_fetch_array($rec);
	$nom_candidat = $record['nom_candidat'];
	$prenom_candidat = $record['prenom_candidat'];
	$intitule_lecon = $record['intitule_lecon'];
	$datep = $record['datep'];
	$heure = $record['heure'];
	$heuref = $record['heuref'];

	$id = $record['id'];

}



?>
<html>
<head>
<link rel="shortcut icon" href="logo1.png">
	<title>Planning</title>
	<link rel="stylesheet" type="text/css" href="style5.css">
	
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
 <strong><h1> Planning </h1></srong> </center>


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
			<th>Lecon</th>
			<th>Date</th>
			<th>Heure début</th>
			<th>Heure fin</th>
			<th colspan="4">Action</th>
		</tr>
	</thead>
	<tbody> 
	<?php while ($row = mysqli_fetch_array($results)) { ?>
	<tr>
	<td><?php echo $row['nom_candidat']; ?> </td>
	<td><?php echo $row['prenom_candidat']; ?> </td>
	<td><?php echo $row['intitule_lecon']; ?> </td>
	<td><?php echo $row['datep']; ?> </td>
	<td><?php echo $row['heure']; ?> </td>
	<td><?php echo $row['heuref']; ?> </td>
	
	<td>
	    <a class="edit_btn" href="planning1.php?edit=<?php echo $row['id']; ?>">Modifier</a>
	</td>
	<td>
	<a class="del_btn" href="server5.php?del=<?php echo $row['id']; ?>">Supprimer</a>
	</td>
	</tr>
<?php } ?>

</tbody>
</table>

<form method="post" action="server5.php" >
<imput type="hidden" name="id" value="<?php echo $id; ?>"> 
		<div class="input-group">
			<label>Nom Candidat</label>
			<input type="text" required="required" name="nom_candidat" value="<?php echo $nom_candidat; ?>">
		</div>



		<div class="input-group">
			<label>Prenom Candidat</label>
			<input type="text" required="required" name="prenom_candidat" value="<?php echo $prenom_candidat; ?>">
		</div>


		<div class="input-group">
			<label>Intitule lecon</label>
			<input type="text" required="required" name="intitule_lecon" value="<?php echo $intitule_lecon; ?>">
		</div>

		<div class="input-group">
			<label>Date</label>
			<input type="date" required="required" name="datep" value="<?php echo $datep; ?>">
		</div>



<div class="input-group">
			<label>Heure début</label>
			<input type="time" required="required" name="heure" value="<?php echo $heure; ?>">
		</div>

		<div class="input-group">
			<label>Heure fin</label>
			<input type="time" required="required" name="heuref" value="<?php echo $heure; ?>">
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