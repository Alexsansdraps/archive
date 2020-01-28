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
        
        <h1>Liste des zones</h1>
        <?php
            include 'connexion.php';  
             
            $sel = $bdd->query('SELECT nomZone, nomStockage FROM zone LEFT JOIN lieustockage ON zone.id_zone = lieustockage.id_stockage');
            $zoness = $sel->fetchAll();
            foreach($zoness as $zone){
                ?>
                  <p><?= $zone['nomZone'];?></p>
                  <p><?= $zone['nomStockage'];?></p>
                                  
        <?php
            };
        ?>          

    </body>

    