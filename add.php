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
// $nomDocument = $_POST['nomDocument'];
// $id_etagere = $_POST['id_etagere'];
//  //  $selectId = $_POST['select_id'];
//   $req = $bdd->prepare("INSERT INTO document (nomDocument, id_etagere) VALUES(:nomDocument, id_etagere)");
 
//   $req->execute([
//       // ':selectId' => $_POST['selectId'],
//       'nomDocument' => $nomDocument,
//       'id_etagere' => $id_etagere
//       // ':nomdoc' => $_POST['nomDocument']
  //]);
  ?>
<?php



// $reqs = $bdd->prepare('INSERT INTO document (nomDocument) VALUES (:nomDocument)');
// $reqs->execute(array(
//     'nomDocument' => $nomdoc,

// ));
// header("location:index.php");

?>