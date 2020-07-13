
<?php require_once './header.php'; 


 // After submitting the form we do not yet have the cookie set, but we can learn desired color from form submission
//  if ($_COOKIE["color"] || $_GET['color'])
//    $bgcolor=$_COOKIE["color"] ? $_COOKIE["color"] : $_GET['color'];
//  else
//    $bgcolor="FFFBFB";
//  echo "<body bgcolor='$bgcolor'>";

// if(!isset($_COOKIE['bg'])) {
//     echo "
//     <h3>choisir le fond d'ecran</h3>
//     <a  href='function/cookie.php?color=bg-success' class='btn btn-success'>VERT</a>
//     <a  href='function/cookie.php?color=bg-primary' class='btn btn-primary'>BLEU</a>
//     <a  href='function/cookie.php?color=bg-danger' class='btn btn-danger'>ROUGE</a>";
// };
?>

    <?php
//  if (!($_COOKIE["color"] || $_GET['color'])) {
//    echo "We noticed you have not selected a background color. Please select from one of the options below.<p>";
//    echo "
// <form>
//   Background Color<p>

// <input type='radio' name='color' value='pink'><font color='pink'>pink</font><p>
// <input type='radio' name='color' value='lightblue'><font color='lightblue'>light blue</font><p>
// <input type='radio' name='color' value='lightgreen'><font color='lightgreen'>light green</font><p>
// <input type='submit'>
// </form>
//   ";
//  }
 
 ?>
    <h1>Archive Dep08</h1>
    <?php // require(__DIR__ . '/views/include/flash'); ?>
    <div class="p1">
        <div class="sp1">
            <h2>Ajouter Personne</h2>

            

            <a href="personne.php">Voir</a>
        </div>

        <div class="sp1">
            <!-- ajouter document-->
            <h2>Ajouter Document</h2>

            
            <a href="document.php">Voir</a>
        </div>
    </div>

    <div class="p1">
        <div class="sp1">
            <!-- ajouter zone -->
            <h2>Ajouter Zone</h2>

            <form method="post" action="function/add-zone.php">
                <p>Sélectionner votre lieu de stockage</p>
                <?php
                        $sqls = "SELECT id_stockage, nomStockage FROM lieustockage";
                        $stockage = $bdd->prepare($sqls);
                        $stockage->execute();
                            
                    ?>

                <select name="zone" id="zone_select">
                    <?php foreach ($stockage as $rows) { ?>
                    <option value=" <?php echo $rows['id_stockage']; ?> ">
                        <?php echo $rows['id_stockage']; ?>
                        Stockage nom :
                        <?php echo $rows['nomStockage']; ?>
                    </option>
                    <?php } ?>
                </select>

                <p>nom :</p>
                <input type="text" name="nomZone" placeholder="Ex : Normandie">

                <button type="submit">Envoyer</button>
            </form>
            <a href="zone.php">Voir</a>
        </div>

        <div class="sp1">
            <!--ajouter etagere-->
            <h2>Ajouter Etagère</h2>

            <form method="post" action="function/add-etagere.php">
                <p>Sélectionner votre zone</p>
                <?php
                    $sql = "SELECT id_zone, nomZone FROM zone";
                    $zone = $bdd->prepare($sql);
                    $zone->execute();
                            
                ?>

                <select name="etagere" id="etagere_select">
                    <?php foreach ($zone as $rowz) { ?>
                    <option value=" <?php echo $rowz['id_zone']; ?> ">
                        <?php echo $rowz['id_zone']; ?>
                        Zone nom :
                        <?php echo $rowz['nomZone']; ?>
                    </option>
                    <?php } ?>
                </select>
                <p>nom :</p>
                <input type="text" name="nomEtagere" placeholder="Ex : Normandie">

                <button type="submit">Envoyer</button>
            </form>
            <a href="etagere.php">Voir</a>
        </div>
    </div>

</body>

</html>
