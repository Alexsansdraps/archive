<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>ARCHIVE</title>
    </head>

    <body>
        
        <h1>Liste des personnes</h1>
        <?php
            include 'connexion.php';  
             
            $sel = $bdd->query('SELECT * FROM personne');
            $personnes=$sel->fetchAll();
            foreach($personnes as $personne){
                ?>
                <table>
                  <p><?php echo $personne['nomPersonne'];?></p>
                  <p><?php echo $personne['prenomPersonne'];?></p>
                  <p><?php echo $personne['adresse'];?></p>
                  <p><?php echo $personne['mail'];?></p>
                  <p><?php echo $personne['telephone'];?></p>
                </table>      
        <?php
            };
        ?>
        
        
        

    </body>
