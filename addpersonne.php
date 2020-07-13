<?php
require_once __DIR__ . '/function/connexion.php';
require_once __DIR__ . '/function/functions.php';

sessionStart();

if (!empty($_POST)) {
	$errors = [];

	if (empty($_POST['nomPersonne'])) {
		$errors['nomPersonne'] = "Votre nomPersonne n'est pas valide";
	}

	if (empty($_POST['prenomPersonne'])) {
		$errors['prenomPersonne'] = "Votre prenomPersonne n'est pas valide";
	}

	if (empty($_POST['adresse'])) {
		$errors['adresse'] = "Votre adresse n'est pas valide";
	}

	if (empty($_POST['mail'])) {
		$errors['mail'] = "Votre mail n'est pas valide";
	}

	if (empty($_POST['telephone'])) {
		$errors['telephone'] = "Votre telephone n'est pas valide";
	}

	if (empty($_POST['pseudo'])) {
		$errors['pseudo'] = "Votre pseudo n'est pas valide";
	}

	// Pour envoyer les données a la base de données
	if (empty($errors)) {
		$req = $bdd->prepare('INSERT INTO personne (nomPersonne, prenomPersonne, adresse, mail, telephone, pseudo) 
                                VALUES (:nomPersonne, :prenomPersonne, :adresse, :mail, :telephone, :pseudo)');

		$req->execute([
			':nomPersonne' => $_POST['nomPersonne'],
			':prenomPersonne' => $_POST['prenomPersonne'],
			':adresse' => $_POST['adresse'],
			':mail' => $_POST['mail'],
			':telephone' => $_POST['telephone'],
			':pseudo' => $_POST['pseudo']
		]);

		$_SESSION['flash'][] = [
			'type' => 'success',
			'content' => 'Utilisateur créé !'
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
			 <?php  // require_once '/views/include/flash.php' ?>

			<header class="mb-4">
				<h4 class="card-title">creation un utilisateur</h4>
			</header>


			<form action="" method="POST">
				<div class="">
					<div class="form-group col-md-12">
						<label>Nom</label>
						<input type="text" name="nomPersonne" class="form-control" placeholder="">
					</div>
					<div class="form-group col-md-12">
						<label>Prénom</label>
						<input type="text" name="prenomPersonne" class="form-control" placeholder="">
					</div>

					<div class="form-group col-md-12">
						<label>adresse</label>
						<input type="text" name="adresse" class="form-control" placeholder="">
					</div>

					<div class="form-group col-md-12">
						<label>mail</label>
						<input type="email" name="mail" class="form-control" placeholder="">
					</div>

					<div class="form-group col-md-12">
						<label>telephone</label>
						<input type="text" name="telephone" class="form-control" placeholder="">
					</div>
					<div class="form-group col-md-12">
						<label>pseudo</label>
						<input type="text" name="pseudo" class="form-control" placeholder="">
					</div>

					<div class="form-group col-md-12">
						<label>mot de passe</label>
						<input type="password" name="mdp" class="form-control" placeholder="">
					</div>
				</div>




				<div clamb-3">
					<button type="submit" class="btn btn-primary btn-block">Ajouter l'utilisateur </button>
				</div>

			</form>
		</article>
	</div>



</section>

<?php
include_once __DIR__ . './footer.php';
?>