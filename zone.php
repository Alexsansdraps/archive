<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="style.css">

        <title>ARCHIVE</title>
    </head>

    <body>
    <ul class="index">
        <li><a href="accueil.php">Accueil</a></li>
        <li><a href="admin.php">Admin</a></li>
    </ul>
        
        <h1>Liste des zones</h1>

        <table>
                    <tr>
                        <th>Nom de la zone</th>
                        <th>Nom du lieu de stockage</th>
                    </tr>
        <?php
            include 'connexion.php';  
             
            $sel = $bdd->query('SELECT nomZone, nomStockage FROM zone 
            LEFT JOIN lieustockage ON zone.id_zone = lieustockage.id_stockage ORDER BY zone.id_stockage');
            $zoness = $sel->fetchAll();
            foreach($zoness as $zone){
                ?>
                <tr>
                  <td><?= $zone['nomZone'];?></td>
                  <td><?= $zone['nomStockage'];?></td>
                </tr>
                                  
        <?php
            };
        ?>  

        </table>

    </body>

    