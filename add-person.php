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
