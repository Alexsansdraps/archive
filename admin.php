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

        <h1>Ajouter traitement</h1>

        <form method="post" action="add-traitement.php">
        <?php
                      $sql = "SELECT id_personne, nomPersonne, prenomPersonne FROM personne";
                      $perso = $bdd->prepare($sql);
                      $perso->execute();
                      
                ?>

                <p>Nom de la personne :</p>
                  <select name="pers" id="pers_select">
                  
                      <?php foreach ($perso as $row) { ?>
                        
                      <option value=" <?php echo $row['id_personne']; ?> ">
                      <?php echo $row['id_personne']; ?>
                        
                        <?php echo $row['nomPersonne']; ?>
                        <?php echo $row['prenomPersonne']; ?>
                      </option>
                      <?php } ?>
                  </select>


                  <?php
                      $sqls = "SELECT id_document, nomDocument FROM document";
                      $docu = $bdd->prepare($sqls);
                      $docu->execute();
                      
                ?>
                  <p>nom du document :</p>
                  <select name="docu" id="docu_select">
                  
                      <?php foreach ($docu as $rows) { ?>
                        
                      <option value=" <?php echo $rows['id_document']; ?> ">
                      <?php echo $rows['id_document']; ?>
                        
                        <?php echo $rows['nomDocument']; ?>
                      </option>
                      <?php } ?>
                  </select>

                  <button type="submit">Envoyer</button>
        </form>

    </body>

