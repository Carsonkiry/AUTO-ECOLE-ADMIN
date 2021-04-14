<?php include('server6.php'); 


if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
    $edit_state = true;
	$rec = mysqli_query($db, "SELECT * FROM conduite WHERE id=$id");
    $record = mysqli_fetch_array($rec);
	$adresse_con = $record['adresse_con'];
	$code_postal_con = $record['code_postal_con'];
	$ville_con = $record['ville_con'];
    $type_examen_con = $record['type_examen_con'];
    $nom_candidat_con = $record['nom_candidat_con'];
    $prenom_candidat_con = $record['prenom_candidat_con'];
    $heure_con = $record['heure_con'];
  
	$id = $record['id'];

}



?>
<html>
<head>
	<title>Examen conduite</title>
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
<strong><h1> Examen de conduite </h1></srong> </center>

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
			<th>Code postal</th>
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
	<td><?php echo $row['adresse_con']; ?> </td>
	<td><?php echo $row['code_postal_con']; ?> </td>
	<td><?php echo $row['ville_con']; ?> </td>
	<td><?php echo $row['type_examen_con']; ?> </td>
    <td><?php echo $row['nom_candidat_con']; ?> </td>
    <td><?php echo $row['prenom_candidat_con']; ?> </td>
    <td><?php echo $row['heure_con']; ?> </td>
	<td>
	    <a class="edit_btn" href="conduite1.php?edit=<?php echo $row['id']; ?>">Modifier</a>
	</td>
	<td>
	<a  class="del_btn" href="server6.php?del=<?php echo $row['id']; ?>">Supprimer</a>
	</td>
	</tr>
<?php } ?>

</tbody>
</table>

<form method="post" action="server6.php" >
<imput type="hidden" name="id" value="<?php echo $id; ?>"> 
		<div class="input-group">
			<label>Adresse </label>
			<input type="text" name="adresse_con" value="<?php echo $adresse_con; ?>">
		</div>



		<div class="input-group">
			<label>Code postal</label>
			<input type="text" name="code_postal_con" value="<?php echo $code_postal_con; ?>">
		</div>


		<div class="input-group">
			<label>Ville</label>
			<input type="text" required="required" name="ville_con" value="<?php echo $ville_con; ?>">
		</div>

<div class="input-group">
			<label>Type examen</label>
			<input type="text" required="required" name="type_examen_con" value="<?php echo $type_examen_con; ?>">
		</div>


        <div class="input-group">
			<label>Nom</label>
			<input type="text" required="required" name="nom_candidat_con" value="<?php echo $nom_candidat_con; ?>">
		</div>

        <div class="input-group">
			<label>Prenom</label>
			<input type="text"required="required"  name="prenom_candidat_con" value="<?php echo $prenom_candidat_con; ?>">
		</div>
        <div class="input-group">
			<label>Heure</label>
			<input type="time" required="required" name="heure_con" value="<?php echo $heure_con; ?>">
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