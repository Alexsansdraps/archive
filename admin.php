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
    <!-- liste des personnes-->
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

            $sel = $bdd->query('SELECT id_personne, nomPersonne, prenomPersonne, adresse, mail, telephone FROM personne ORDER BY id_personne');
            $personnes=$sel->fetchAll();
            foreach($personnes as $personne){ ?>
                <form method="post" action="modif.php?id=<?= $personne['id_personne']; ?>">
                    <input type="text" name="nomPersonne" value="<?= $personne['nomPersonne']; ?>" placeholder="NOM">
                    <input type="text" name="prenomPersonne" value="<?= $personne['prenomPersonne']; ?>" placeholder="PRENOM">
                    <input type="text" name="adresse" value="<?= $personne['adresse']; ?>" placeholder="ADRESSE">
                    <input type="text" name="mail" value="<?= $personne['mail']; ?>" placeholder="MAIL">
                    <input type="text" name="telephone" value="<?= $personne['telephone']; ?>" placeholder="TELEPHONE">
                    <button type="submit">Envoyer</button>
                </form>

                    <a href="delete.php?id=<?= $personne['id_personne'] ?>">supprimer</a>
                    <br>
          <?php  }; ?>
    <!-- ajouter les traitement-->
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
    <!-- afficher les traitement-->
    <h1>Liste des traitements</h1>

    <table>
        <tr>
            <th>Nom de la personne</th>
            <th>Prénom de la personne</th>
            <th>Nom du document</th>
        </tr>
        <?php
                include 'connexion.php';  
                
                $tab = $bdd->query('SELECT id, nomPersonne, prenomPersonne, nomDocument FROM traiter2
                                      
                                    JOIN personne on personne.id_personne = traiter2.id_personne 
                                    JOIN document on document.id_document = traiter2.id_document');
                $trait = $tab->fetchAll();
                foreach($trait as $trai){
                    ?>
        <tr>

            <td><?= $trai['nomPersonne'];?></td>
            <td><?= $trai['prenomPersonne'];?></td>
            <td><?= $trai['nomDocument'];?></td>
            <td><a href="delete-traitement.php?id=<?= $trai['id']; ?>">supprimer</a></td>
        </tr>

        <?php
            };
        ?>

    </table>

    <!--ajouter des affectations-->
    <h1>Ajouter affectations</h1>

    <form method="post" action="add-affectation.php">
        <?php
                      $sql = "SELECT id_personne, nomPersonne, prenomPersonne FROM personne";
                      $perso = $bdd->prepare($sql);
                      $perso->execute();
                      
                ?>

        <p>Nom de la personne :</p>
        <select name="perso" id="perso_select">

            <?php foreach ($perso as $row) { ?>

            <option value=" <?php echo $row['id_personne']; ?> ">
                <?php echo $row['id_personne']; ?>

                <?php echo $row['nomPersonne']; ?>
                <?php echo $row['prenomPersonne']; ?>
            </option>
            <?php } ?>
        </select>


        <?php
            $sqls = "SELECT id_zone, nomZone FROM zone";
            $zon = $bdd->prepare($sqls);
            $zon->execute();
                      
        ?>
        <p>nom de la zone :</p>
        <select name="zon" id="zon_select">

            <?php foreach ($zon as $rows) { ?>

            <option value=" <?php echo $rows['id_zone']; ?> ">
                <?php echo $rows['id_zone']; ?>

                <?php echo $rows['nomZone']; ?>
            </option>
            <?php } ?>
        </select>

        <button type="submit">Envoyer</button>
    </form>

    <!--afficher les affectations-->

    <h1>Liste des affectations</h1>

    <table>
        <tr>
            <th>Nom de la personne</th>
            <th>Prénom de la personne</th>
            <th>Nom de la zone</th>
        </tr>
        <?php
    include 'connexion.php';  
     
    $tab = $bdd->query('SELECT id_affecter, nomPersonne, prenomPersonne, nomZone FROM affecter2
                        JOIN personne on personne.id_personne = affecter2.id_personne 
                        JOIN zone on zone.id_zone = affecter2.id_zone');
    $aff = $tab->fetchAll();
    foreach($aff as $af){
        ?>
        <tr>
            <td><?= $af['nomPersonne'];?></td>
            <td><?= $af['prenomPersonne'];?></td>
            <td><?= $af['nomZone'];?></td>
            <td><a href="delete-affectation.php?id_affecter=<?= $af['id_affecter']; ?>">supprimer</a></td>
        </tr>

        <?php
    };
?>

    </table>

</body>