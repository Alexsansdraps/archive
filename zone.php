<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>ARCHIVE</title>
    </head>

    <body>
        
        <h1>Liste des zones</h1>
        <?php
            include 'connexion.php';  
             
            $sel = $bdd->query('SELECT * FROM zone');
            $zoness=$sel->fetchAll();
            foreach($zoness as $zone){
                ?>
                  <p><?php echo $zone['nomZone'];?></p>
                                  
        <?php
            };
        ?>          

    </body>