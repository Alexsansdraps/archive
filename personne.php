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
        <li><a href="index.php">Accueil</a></li>
        <li><a href="admin.php">Admin</a></li>
    </ul>
        
        <h1>Liste des personnes</h1>

        <table>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Adresse</th>
                        <th>Mail</th>
                        <th>Téléphone</th>
                    </tr>
        <?php
            include 'connexion.php';  
             
            $sel = $bdd->query('SELECT * FROM personne');
            $personnes=$sel->fetchAll();
            foreach($personnes as $personne){
                ?>              
                    <tr>
                        <td><?php echo $personne['nomPersonne'];?></td>
                        <td><?php echo $personne['prenomPersonne'];?></td>
                        <td><?php echo $personne['adresse'];?></td>
                        <td><?php echo $personne['mail'];?></td>
                        <td><?php echo $personne['telephone'];?></td>
                    </tr>            
        <?php
            };
        ?>
        </table> 
        
    </body>
