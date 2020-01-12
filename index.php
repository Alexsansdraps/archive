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
        <h1>Archive Dep08</h1>
        <h2>Ajouter Personne</h2>

        <form method="post" action="add.php">
                <table>
                    <tr>
                        <td>nom</td>
                        <td><input type="text" name="nomPersonne" placeholder="Ex : bob"></td>
                    </tr>
                    <tr>
                        <td>Prénom</td>
                        <td><input type="text" name="prenomPersonne" placeholder="Ex : 20 ans"></td>
                    </tr>
                    <tr>
                        <td>Adresse</td>
                        <td><input type="text" name="adresse" placeholder="Ex : 1, rue des aubépines"></td>
                    </tr>
                    <tr>
                        <td>Mail</td>
                        <td><input type="text" name="mail" placeholder="Ex : bob@mail.net"></td>
                    </tr>
                    <tr>
                        <td>Téléphone</td>
                        <td><input type="text" name="telephone" placeholder="Ex :  00 00 00 00 00"></td>
                    </tr>
                </table>
            <button type="submit">Envoyer</button>
        </form>
        <a href="personne.php">Voir</a>


        <h2>Ajouter Document</h2>

        <form method="post" action="add.php">
                <table>
                    <tr>
                        <td>nom</td>

                        <td><input type="text" name="nomDocument" placeholder="Ex : Normandie"></td>

                      
                    </tr>


<?php 
 
$sql = "SELECT id_etagere, nomEtagere FROM etagere";
$statement = $bdd->prepare($sql);
$statement->execute();
// var_dump($statement);

?>

                    <select name="doc" id="doc_select" name="select_id">
                    <?php foreach ($statement as $row) { ?>
                        <option value="<?php echo $row['id_etagere']; ?>"><?php echo $row['id_etagere']; ?> étagère nom : <?php echo $row['nomEtagere']; ?></option>
                    <?php } ?>
                    </select>
                </table>
            <button type="submit">Envoyer</button>
        </form>
        <a href="document.php">Voir</a>

        <h2>Ajouter Zone</h2>

        <form method="post" action="add.php">
                <table>
                    <tr>
                        <td>nom</td>
                        <td><input type="text" name="nomZone" placeholder="Ex : Normandie"></td>
                    </tr>
                </table>
            <button type="submit">Envoyer</button>
        </form>
        <a href="zone.php">Voir</a>

        <h2>Ajouter Etagère</h2>

        <form method="post" action="add.php">
                <table>
                    <tr>
                        <td>nom</td>
                        <td><input type="text" name="nomEtagere" placeholder="Ex : Normandie"></td>
                    </tr>
                </table>
            <button type="submit">Envoyer</button>
        </form>
        <a href="etagere.php">Voir</a>

    </body>

