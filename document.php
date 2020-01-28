<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>ARCHIVE</title>
    </head>

    <body>
    <ul class="index">
        <li><a href="index.php">Accueil</a></li>
        <li><a href="admin.php">Admin</a></li>
    </ul>
        
        <h1>Liste des documents</h1>
        <?php
            include 'connexion.php';  
             
            $sel = $bdd->query('SELECT nomDocument, nomEtagere FROM document LEFT JOIN etagere ON document.id_document = etagere.id_etagere');
            $documents = $sel->fetchAll();
            foreach($documents as $document){
                ?>
                  <p><?= $document['nomDocument'];?></p>
                  <p><?= $document['nomEtagere'];?></p>
                                  
        <?php
            };
        ?>          

    </body>
