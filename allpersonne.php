<?php require_once './header.php';
require_once './function/connexion.php';
?>

<div class="container">
<h1>Liste des personnes</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Adresse</th>
                <th scope="col">Mail</th>
                <th scope="col">Téléphone</th>
            </tr>
        </thead>
        <?php 
        $reqResponse = $bdd->query('SELECT id_personne, nomPersonne, prenomPersonne, adresse, mail, telephone FROM personne');
        $personnes = $reqResponse->fetchAll();
        ?>
        <tbody>
            <?php foreach($personnes as $personne){ ?>
            <tr>
                <th scope="row"><?= $personne['id_personne'] ?></th>
                <td><?= $personne['nomPersonne'] ?></td>
                <td><?= $personne['prenomPersonne'] ?></td>
                <td><?= $personne['adresse'] ?></td>
                <td><?= $personne['mail'] ?></td>
                <td><?= $personne['telephone'] ?></td>
            </tr>
            <?php }; ?> 
        </tbody>
    </table>
</div>

<?php require_once './header.php'; ?>