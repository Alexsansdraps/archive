<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Archive</title>
</head> 
<body  class="<?php if(isset($_COOKIE['bg'])){
    echo $_COOKIE['bg'];};?>">

   <?php include 'function/connexion.php'; ?>


    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal">Archivage</h5>
  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-dark" href="accueil.php">Accueil</a>
    <a class="p-2 text-dark" href="admin.php">Admin</a>
    <a class="p-2 text-dark" href="addpersonne.php">Add personne</a>
    <a class="p-2 text-dark" href="allpersonne.php">all personne</a>
    <a class="p-2 text-dark" href="adddocument.php">add document</a>
    <a class="p-2 text-dark" href="function/logout.php">déconnecter
    <?php if (isset($_SESSION['id_personne']) AND isset($_SESSION['pseudo']))
                            {
                               echo $_SESSION['pseudo'];
                           } ?>
</a>
   
  </nav>

</div>