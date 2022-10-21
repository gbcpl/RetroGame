<?php

	session_start();
	
	if (isset($_SESSION['connect'])) {
        header('location: index.php');
		exit();
    }

	require('src/log.php');


	if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_two'])) {

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
			header('location: signin.php?error=1&message=Vos mots de passe ne sont pas identiques');
			exit();
		}

		// VERIFIER EMAIL

		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {

			header('location: signin.php?error=1&message=Votre email n\'est pas correct');
			exit();

		}

		// VERIFIER SI EMAIL EST DEJA UTILISE

		$req = $db->prepare("SELECT count(*) as numberEmail FROM Customer WHERE mail = ?");
		$req->execute(array($email));

		while($email_verification = $req->fetch()) {

			if ($email_verification['numberEmail'] != 0) {
				
				header('location: signin.php?error=1&message=Votre adresse email est déjà utilisée');
				exit();

			}

		}
		
		// HASH
		$secret = sha1($email).time();
		$secret = sha1($secret).time();


		// CHIFFRAGE MDP

		$password = "aq1".sha1($password."123")."25";

		// ENVOI

		$req = $db->prepare("INSERT INTO Customer(mail, password, secret) VALUES (?, ?, ?)");
		$req->execute(array($email, $password, $secret));

		header('location: signin.php?success=1');
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
	<meta name="description" content="Inscription à Rétro Game"/>    
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>S'inscrire sur RetroGame</title>
</head>
<body>

<?php include('src/header.php'); ?>
<h4>Inscrivez-vous à RetroGame afin de bénéficier de nombreux avantages sur nos produits.</h4>
    <main>
        <section>
            <div>

                <?php if(isset($_GET['error'])) {
                    
                    if(isset($_GET['message'])) {
                        echo'<div class="alert error">'.htmlspecialchars($_GET['message']).'</div>';
                    } 
                    } else if (isset($_GET['success'])) {
                    echo'<div class="alert success">Votre compte a été créé. <a href="login.php">Connectez-vous</a>.</div>';
                    }?>

            <form class="signin" method="post" action="signin.php">
				<input class="signin_form" type="email" name="email" placeholder="Votre adresse email" required />
				<input class="signin_form" type="password" name="password" placeholder="Mot de passe" required />
				<input class="signin_form" type="password" name="password_two" placeholder="Retapez votre mot de passe" required />
				<button class="submit" type="submit">S'inscrire</button>
			</form>
            </div>
        </section>
    </main>


<?php include('src/footer.php'); ?>

</body>
</html>