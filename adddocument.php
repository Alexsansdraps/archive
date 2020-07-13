<?php
require_once __DIR__ . '/function/connexion.php';
require_once __DIR__ . '/function/functions.php';

sessionStart();
if (!empty($_POST)) {
    $errors = [];

    if (empty($_POST['nomDocument'])) {
        $errors['nomDocument'] = "Votre nomDocument n'est pas valide";
    }

    if (empty($errors)) {
        $req = $bdd->prepare('INSERT INTO document (nomDocument, id_etagere, created_at) VALUES (:nomDocument, :id_etagere, now())');

        $req->execute([
            'nomDocument' => $_POST['nomDocument'],
            'id_etagere' => $_POST['doc'],
        ]);

        $_SESSION['flash'][] = [
            'type' => 'success',
            'content' => 'document créé !'
        ];

        header("location: ./accueil.php");
        exit();
    }
}
?>
<?php require_once(__DIR__ . './header.php'); ?>

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">

    <!-- ============================ COMPONENT REGISTER   ================================= -->
    <div class="card mx-auto" style="max-width:520px; margin-top:40px;">
        <article class="card-body">
            <form method="POST" action="">

                <p>Sélectionner votre étagères</p>
                <?php if (isset($_SESSION['flash'])) : ?>

                    <?php foreach ($_SESSION['flash'] as $flash) : ?>
                        <div class="alert alert-<?= $flash['type']; ?>">
                            <?= $flash['content']; ?>
                        </div>
                    <?php endforeach; ?>
                    <?php unset($_SESSION['flash']); ?>

                <?php endif; ?>
                <!-- REQUETE pour afficher tout les documents -->
                <?php $sql = "SELECT id_etagere, nomEtagere FROM etagere";
                $statement = $bdd->prepare($sql);
                $statement->execute();
                ?>
                <div class="form-group">
                    <select name="doc" class="form-control" id="doc_select">
                        <?php foreach ($statement as $row) { ?>
                            <option value="<?= $row['id_etagere']; ?> ">
                               <?= $row['nomEtagere']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="nomDocument">Nom du document</label>
                    <input type="text" name="nomDocument" class="form-control" placeholder="Exemple : document sur la biologie">
                </div>
                
                <button type="submit" class="btn btn-outline-primary">Envoyer</button>
            </form>

        </article>
    </div>



</section>