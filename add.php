<?php

include 'connexion.php';
$nom=$_POST['nomPersonne'];
$prenom=$_POST['prenomPersonne'];
$adresse=$_POST['adresse'];
$mail=$_POST['mail'];
$telephone=$_POST['telephone'];

$req = $bdd->prepare('INSERT INTO personne (nomPersonne, prenomPersonne, adresse, mail, telephone) VALUES (:nomPersonne, :prenomPersonne, :adresse, :mail, :telephone)');
$req->execute(array(
    'nomPersonne' => $nom,
    'prenomPersonne' => $prenom,
    'adresse' => $adresse,
    'mail' => $mail,
    'telephone' => $telephone,

    
));
header("location:index.php");

?>

<?php

include 'connexion.php';
$nomdoc=$_POST['nomDocument'];


$reqs = $bdd->prepare('INSERT INTO personne (nomDocument) VALUES (:nomDocument)');
$reqs->execute(array(
    'nomDocument' => $nomdoc,

));
header("location:index.php");

?>