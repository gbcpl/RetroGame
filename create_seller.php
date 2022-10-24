<?php

	session_start();

	if( !isset($_SESSION['admin']) ) {
		header("Location: index.php?message='vous n'êtes pas administrateur'");
		exit;
	}

	if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_two']) 
    && !empty($_POST['last_name']) && !empty($_POST['first_name']) && !empty($_POST['company'])) {

		require('src/connect.php');

		// CREER VARIABLES
		$last_name = htmlspecialchars($_POST['last_name']);
		$first_name = htmlspecialchars($_POST['first_name']);
		$email = htmlspecialchars($_POST['email']);
		$company = htmlspecialchars($_POST['company']);
		$password = htmlspecialchars($_POST['password']);
		$password_two = htmlspecialchars($_POST['password_two']);

		// VERIFIER SI LES DEUX MDP SONT EGAUX

		if ($password != $password_two) {
			header('location: create_seller.php?error=1&message=Vos mots de passe ne sont pas identiques');
			exit();
		}

		// VERIFIER EMAIL

		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {

			header('location: create_seller.php?error=1&message=Votre email n\'est pas correct');
			exit();

		}

		// VERIFIER SI EMAIL EST DEJA UTILISE

		$req = $db->prepare("SELECT count(*) as numberEmail FROM seller WHERE mail = ?");
		$req->execute(array($email));

		while($email_verification = $req->fetch()) {

			if ($email_verification['numberEmail'] != 0) {
				
				header('location: create_seller.php?error=1&message=Votre adresse email est déjà utilisée');
				exit();

			}

		}
		
		// HASH
		$secret = sha1($email).time();
		$secret = sha1($secret).time();


		// CHIFFRAGE MDP

		$password = "aq1".sha1($password."123")."25";

		// ENVOI

		$req = $db->prepare("INSERT INTO seller(last_name, first_name, mail, password, company) VALUES (?, ?, ?, ?, ?)");
		$req->execute(array($last_name, $first_name, $email, $password, $company));

		header('location: create_seller.php?success=1');
		
		exit();

	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="pragma" content="no-cache" />
	<link rel="icon" type="image/x-icon" href="img/favicon.ico">
	<meta name="description" content="Créez un compte seller qui pourra ajouter des produits."/>    
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Retro Game</title>
</head>
<body>

<?php include('src/header.php'); ?>

<aside>
        <nav class="navbarleft fixed-left">
            <ul id="navbaradmin">
                <li><h2 class="h2admin">Tableau de bord</h2></li>
                <li><a href="admin.php">Accueil</a></li>
                <li><a href="create_seller.php">Créer un vendeur</a></li>
                <li><a href="messages_recus.php">Messagerie</a></li>
                <li><a href="logout.php">Déconnexion</a></li>
            </ul>
        </nav>
    </aside>

    <main>    
    <form class="seller" method="post" action="create_seller.php">
				<input class="signin_seller" type="text" name="last_name" placeholder="Nom de famille" required />
                <input class="signin_seller" type="text" name="first_name" placeholder="Prénom" required />
				<input class="signin_seller" type="email" name="email" placeholder="E-mail" required />
                <input class="signin_seller" type="text" name="company" placeholder="Entreprise" required />                
                <input class="signin_seller" type="password" name="password" placeholder="Mot de passe" required />
				<input class="signin_seller" type="password" name="password_two" placeholder="Retapez le mot de passe" required />
				<button class="submit" type="submit">Créer un compte vendeur</button>
	</form>
</main>
<?php include('src/footer.php'); ?>

</body>
</html>