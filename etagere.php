<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>ARCHIVE</title>
    </head>

    <body>
        
        <h1>Liste des étagères</h1>
        <?php
            include 'connexion.php';  
             
            $sel = $bdd->query('SELECT * FROM etagere');
            $etageres=$sel->fetchAll();
            foreach($etageres as $etagere){
                ?>
                  <p><?php echo $etagere['nomEtagere'];?></p>
                                  
        <?php
            };
        ?>          

    </body>