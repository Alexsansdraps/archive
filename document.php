<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>ARCHIVE</title>
    </head>

    <body>
        
        <h1>Liste des documents</h1>
        <?php
            include 'connexion.php';  
             
            $sel = $bdd->query('SELECT * FROM document');
            $documents=$sel->fetchAll();
            foreach($documents as $document){
                ?>
                  <p><?php echo $document['nomDocument'];?></p>
                                  
        <?php
            };
        ?>          

    </body>
