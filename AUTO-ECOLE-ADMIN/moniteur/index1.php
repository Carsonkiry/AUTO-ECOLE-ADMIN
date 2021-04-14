<?php include('server1.php'); 


if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
    $edit_state = true;
	$rec = mysqli_query($db, "SELECT * FROM moniteur WHERE id=$id");
    $record = mysqli_fetch_array($rec);
	$nom = $record['nom'];
	$prenom = $record['prenom'];
	$mail = $record['mail'];
    $tel = $record['tel'];

	$id = $record['id'];

}



?>
<html>
<head>
	<title>Moniteur</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
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
 <strong><h1> Liste des moniteurs </h1></srong> </center>

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
			<th>Mail</th>
			<th>Tel</th>
			<th colspan="4">Action</th>
		</tr>
	</thead>
	<tbody> 
	<?php while ($row = mysqli_fetch_array($results)) { ?>
	<tr>
	<td><?php echo $row['nom']; ?> </td>
	<td><?php echo $row['prenom']; ?> </td>
	<td><?php echo $row['mail']; ?> </td>
	<td><?php echo $row['tel']; ?> </td>
	<td>
	    <a class="edit_btn" href="index1.php?edit=<?php echo $row['id']; ?>">Modifier</a>
	</td>
	<td>
	<a class="del_btn" href="server1.php?del=<?php echo $row['id']; ?>">Supprimer</a>
	</td>
	</tr>
<?php } ?>

</tbody>
</table>

<form method="post" action="server1.php" >
<imput type="hidden" name="id" value="<?php echo $id; ?>"> 
		<div class="input-group">
			<label>Nom moniteur</label>
			<input type="text" required="required" name="nom" value="<?php echo $nom; ?>">
		</div>



		<div class="input-group">
			<label>Prenom moniteur</label>
			<input type="text" required="required" name="prenom" value="<?php echo $prenom; ?>">
		</div>


		<div class="input-group">
			<label>Mail moniteur</label>
			<input type="email" required="required" name="mail" value="<?php echo $mail; ?>">
		</div>

<div class="input-group">
			<label>Tel moniteur</label>
			<input type="text" required="required" name="tel" value="<?php echo $tel; ?>">
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