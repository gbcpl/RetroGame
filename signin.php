<?php

	session_start();
	
	require('src/connect.php');


	if (isset($_SESSION['connect'])) {
        header('location: index.php');
		exit();
    }

	require('src/log.php');


	if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_two'])) {


		// CREER VARIABLES
		$email = htmlspecialchars($_POST['email']);
		$password = htmlspecialchars($_POST['password']);
		$password_two = htmlspecialchars($_POST['password_two']);

		// VERIFIER SI LES DEUX MDP SONT EGAUX

		if ($password != $password_two) {
			header('location: signin.php?error=1&message=Vos mots de passe ne sont pas identiques');
			exit();
		}

		// VERIFIER EMAIL
		elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {

			header('location: signin.php?error=1&message=Votre email n\'est pas correct');
			exit();

		}

		// VERIFIER SI EMAIL EST DEJA UTILISE

		else {


		$req = $db->prepare("SELECT count(*) as numberEmail FROM customer WHERE mail = ?");
		$req->execute(array($email));
		if ($req->rowCount() != 0) {
			
			header('location: signin.php?error=1&message=Votre%20adresse%20email%20est%20d%C3%A9j%C3%A0%20utilis%C3%A9e');
			exit();

		}
		else {

		// HASH
		$secret = sha1($email).time();
		$secret = sha1($secret).time();


		// CHIFFRAGE MDP

		$password = "aq1".sha1($password."123")."25";

		// ENVOI

		$req = $db->prepare("INSERT INTO customer(mail, password, secret) VALUES (?, ?, ?)");
		$req->execute(array($email, $password, $secret));

		header('location: index.php?success=1');
		}
	}}

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