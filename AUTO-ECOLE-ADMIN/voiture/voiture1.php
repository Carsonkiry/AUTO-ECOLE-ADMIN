<?php include('server4.php'); 


if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
    $edit_state = true;
	$rec = mysqli_query($db, "SELECT * FROM voiture WHERE id=$id");
    $record = mysqli_fetch_array($rec);
	$modele = $record['modele'];
	$annee = $record['annee'];
	$immatriculation = $record['immatriculation'];
    $kilometrage = $record['kilometrage'];

	$id = $record['id'];

}



?>
<html>
<head>
	<title>Voiture</title>
	<link rel="stylesheet" type="text/css" href="style4.css">
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
 <strong><h1> Liste des voitures </h1></srong> </center>


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
			<th>Modele</th>
			<th>Annee</th>
			<th>Immatriculation</th>
			<th>Kilometrage</th>
			<th colspan="4">Action</th>
		</tr>
	</thead>
	<tbody> 
	<?php while ($row = mysqli_fetch_array($results)) { ?>
	<tr>
	<td><?php echo $row['modele']; ?> </td>
	<td><?php echo $row['annee']; ?> </td>
	<td><?php echo $row['immatriculation']; ?> </td>
	<td><?php echo $row['kilometrage']; ?> </td>
	<td>
	    <a class="edit_btn" href="voiture1.php?edit=<?php echo $row['id']; ?>">Modifier</a>
	</td>
	<td>
	<a class="del_btn" href="server4.php?del=<?php echo $row['id']; ?>">Supprimer</a>
	</td>
	</tr>
<?php } ?>

</tbody>
</table>

<form method="post" action="server4.php" >
<imput type="hidden" name="id" value="<?php echo $id; ?>"> 
		<div class="input-group">
			<label>Modele</label>
			<input type="text" required="required" name="modele" value="<?php echo $modele; ?>">
		</div>


		

		<div class="input-group">
			<label>Annee</label>
			<input type="text" required="required" name="annee" value="<?php echo $annee; ?>">
		</div>


		<div class="input-group">
			<label>Immatriculation</label>
			<input type="text" required="required" name="immatriculation" value="<?php echo $immatriculation; ?>">
		</div>

<div class="input-group">
			<label>Kilometrage</label>
			<input type="text" required="required" name="kilometrage" value="<?php echo $kilometrage; ?>">
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