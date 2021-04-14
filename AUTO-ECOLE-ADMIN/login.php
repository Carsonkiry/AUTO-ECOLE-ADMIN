<?php

$host="localhost";
$user="root";
$password="";
$db="auto_ecole";

$conn = mysqli_connect($host,$user,$password,$db);
mysqli_select_db($conn, $db);

if(isset($_POST['username'])){

    $uname=$_POST['username'];
    $password=$_POST['password'];

    $sql="select * from login where User='".$uname."'AND Password='".$password."' limit 1";

    $result=mysqli_query($conn,$sql);
    
    if(mysqli_num_rows($result)==1){
        header('Location: accueil.php');
        exit();
    }
    else{
        echo " Votre identifianr ou mot de passe est incorrect";
        header('Location: login.php');
        exit();
    }

}
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
<link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">
  <link href="/your-path-to-fontawesome/css/brands.css" rel="stylesheet">
  <link href="/your-path-to-fontawesome/css/solid.css" rel="stylesheet">
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <meta charset="utf-8">
    <title>َEspace connexion </title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="logo1.png">
</head>
<body>





   <div>
      
     
      <a href="index.html" class="btn btn-primary" >Accueil</a>
      <a href="PermisA.php" class="btn btn-primary">Permis A</a>
      <a href="PermisB.php"class="btn btn-primary" >Permis B </a>
      <a href="BSR.php"class="btn btn-primary" >BSR</a>
      <a href="AAC.php" class="btn btn-primary">ACC</a>
      <a href="login.php" class="btn btn-primary">Connexion</a>
      </div>



    <form method="POST" action="#" class="box">
      <h1>Admin <i class="fas fa-user-tie"></i></h1>
      <input type="text"  required="required" name="username" placeholder="Identifiant">
      <input type="password" required="required" name="password" placeholder="Mot de passe">
      <input type="submit" name="submit" value="Connexion">
    </form>
</body>
</html>
