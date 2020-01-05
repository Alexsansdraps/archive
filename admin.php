<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>ARCHIVE</title>
    </head>

    <body>
        <?php
            include 'connexion.php';   
        ?>
        <ul class="index">
            <li><a href="index.php">Accueil</a></li>
            <li><a href="admin.php">Admin</a></li>
        </ul>
        
        <h1>AFFICHER</h1>
        <?php

            include 'connexion.php';

            $sel = $bdd->query('SELECT * FROM personne');
            $personnes=$sel->fetchAll();
            foreach($personnes as $personne){
                echo' <form method="post" action="modif.php?id='.$personne['id_personne'].'">
                    <input type="text" name="nomPersonne" value="'.$personne['nomPersonne'].'" placeholder="NOM">
                    <input type="text" name="prenomPersonne" value="'.$personne['prenomPersonne'].'" placeholder="PRENOM">
                    <input type="text" name="adresse" value="'.$personne['adresse'].'" placeholder="ADRESSE">
                    <input type="text" name="mail" value="'.$personne['mail'].'" placeholder="MAIL">
                    <input type="text" name="telephone" value="'.$personne['telephone'].'" placeholder="TELEPHONE">
                    <button type="submit">Envoyer</button>
                    </form>

                    <a href="delete.php?id='.$personne['id_personne'].'">supprimer</a>
                    <br>';
            };
        ?>

    </body>

