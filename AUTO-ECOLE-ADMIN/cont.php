<?php

//ouverture d'une connexion à la bdd 
$objetPdo = new PDO('mysql:host=localhost;dbname=inscription_candidat','root','');

//preparation de la requete SQL
$pdoStat = $objetPdo->prepare('INSERT INTO contact VALUES (NULL, :nom,:mel, :tel, :obj, :mess,)');


// on lie chaque marqueur à une valeur 
$pdoStat->bindValue(':nom', $_POST['lastname'], PDO::PARAM_STR);
$pdoStat->bindValue(':mel', $_POST['mail'], PDO::PARAM_STR);
$pdoStat->bindValue(':tel', $_POST['phone'], PDO::PARAM_STR);
$pdoStat->bindValue(':obj', $_POST['subject'], PDO::PARAM_STR);
$pdoStat->bindValue(':mess', $_POST['message'], PDO::PARAM_STR);

//éxecution de la requete préparée

$insertIsOK = $pdoStat->execute();

if($insertIsOK){
    $message = 'Le contact a été ajouté dans la bdd';
}

else{
    $message = 'Echec de linsertion';
}

?>