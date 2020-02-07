<?php
include 'connexion.php';

$nomPersonne=$_POST['perso'];
$nomZone=$_POST['zon'];


$req = $bdd->prepare('INSERT INTO affecter (id_personne, id_zone) VALUES (:id_personne, :id_zone)');
$req->execute(array(
    'id_personne' => $nomPersonne,
    'id_zone' => $nomZone,
  ));

  header("location:admin.php");
?>