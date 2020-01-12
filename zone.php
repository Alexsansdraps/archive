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
             
            $sel = $bdd->query('SELECT nomZone, nomStockage FROM zone LEFT JOIN lieustockage ON zone.id_zone = lieustockage.id_stockage');
            $zoness=$sel->fetchAll();
            foreach($zoness as $zone){
                ?>
                  <p><?php echo $zone['nomZone'];?></p>
                  <p><?php echo $zone['nomStockage'];?></p>
                                  
        <?php
            };
        ?>          

    </body>

    d'accord, etape 1) tu sais que tu veux ajouter un document, donc tu doit faire un form, ensuite quel champs que tu veux dans ton form. 
    etape 2, tu veux ajouter  en meme temps sur l'etagère, moi j'aurai fait une requetes pour prendre
    tout les etages, et le mettre dans un select de tout les étages dedans, en gros tu aurai un select, avec une boucle d'une requetes qui affiche tout les étages.