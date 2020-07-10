
<?php require_once './header.php'; 

if(!isset($_COOKIE['bg'])) {
    echo "
    <h3>choisir le fond d'ecran</h3>
    <a  href='function/cookie.php?color=bg-success' class='btn btn-success'>VERT</a>
    <a  href='function/cookie.php?color=bg-primary' class='btn btn-primary'>BLEU</a>
    <a  href='function/cookie.php?color=bg-danger' class='btn btn-danger'>ROUGE</a>";
};
?>

    <h1>AFFICHER</h1>
    <?php

            include 'function/connexion.php';

            $sel = $bdd->query('SELECT id_personne, nomPersonne, prenomPersonne, adresse, mail, telephone FROM personne ORDER BY id_personne');
            $personnes=$sel->fetchAll();
            foreach($personnes as $personne){ ?>
            <div class="p3">
                <form method="post" action="modif.php?id=<?= $personne['id_personne']; ?>">
                    <input type="text" name="nomPersonne" value="<?= $personne['nomPersonne']; ?>" placeholder="NOM">
                    <input type="text" name="prenomPersonne" value="<?= $personne['prenomPersonne']; ?>" placeholder="PRENOM">
                    <input type="text" name="adresse" value="<?= $personne['adresse']; ?>" placeholder="ADRESSE">
                    <input type="text" name="mail" value="<?= $personne['mail']; ?>" placeholder="MAIL">
                    <input type="text" name="telephone" value="<?= $personne['telephone']; ?>" placeholder="TELEPHONE">
                    <button type="submit">Envoyer</button>
                </form>

                    <a href="function/delete.php?id=<?= $personne['id_personne'] ?>">supprimer</a>
                    
            </div>
          <?php  }; ?>
    <!-- ajouter les traitement-->
    <h1>Ajouter traitement</h1>
        <div class="p2">
            <form method="post" action="function/add-traitement.php">
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
        </div>
    <!-- afficher les traitement-->
    <h1>Liste des traitements</h1>

    <table class="t2">
        <tr>
            <th>Nom de la personne</th>
            <th>Prénom de la personne</th>
            <th>Nom du document</th>
            <th></th>
        </tr>
        <?php
                include 'function/connexion.php';  
                
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
            <td><a href="function/delete-traitement.php?id=<?= $trai['id']; ?>">supprimer</a></td>
        </tr>

        <?php
            };
        ?>

    </table>

    <!--ajouter des affectations-->
    <h1>Ajouter affectations</h1>
        <div class="p2">

            <form method="post" action="function/add-affectation.php">
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
        </div>

    <!--afficher les affectations-->

    <h1>Liste des affectations</h1>

    <table class="t2">
        <tr>
            <th>Nom de la personne</th>
            <th>Prénom de la personne</th>
            <th>Nom de la zone</th>
            <th></th>
        </tr>
        <?php
    include 'function/connexion.php';  
     
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
            <td><a href="function/delete-affectation.php?id_affecter=<?= $af['id_affecter']; ?>">supprimer</a></td>
        </tr>

        <?php
    };
?>

    </table>

</body>
</html>
