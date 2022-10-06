<?php 

	session_start();

	require('src/logadmin.php');

	if(!empty($_POST['email']) && !empty($_POST['password'])) {
		
		require('src/connect.php');

			// VARIABLES
			$email = htmlspecialchars($_POST['email']);
			$password = htmlspecialchars($_POST['password']);

			// ADRESSE EMAIL
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				header('location: login_admin.php?error=1&message=Votre adresse email est invalide');
				exit();
			}
			// CHIFFRAGE DU MDP
			$password = "aq1".sha1($password."123")."25";

			// EMAIL UTILISE ?
			$req = $db->prepare("SELECT count(*) as numberEmail FROM Admin WHERE mail = ?");
			$req->execute(array($email));

			while($email_verification = $req->fetch()) {
				if($email_verification['numberEmail'] !=1) {
					header('location: login_admin.php?error=1&message=Impossible de vous authentifier.');
					exit();
				}
			}
			
			// CONNEXION

			$req = $db->prepare("SELECT * FROM Admin WHERE mail = ?");
			$req->execute(array($email));

			while($user = $req->fetch()) {
				if("root" == $user['password']) {
					$_SESSION['connect'] = 1;
					$_SESSION['email'] = $user['email'];

					if(isset($_POST['auto'])) {
						setcookie('auth', $user['secret'], time() + 364*24*3600, '/', null, false, true);
					}

					header('location: admin.php?success=1');
					exit(); 
				} else {
					header('location: login_admin.php?error=1&message=Impossible de vous authentifier.MDP');	
					exit();
				}
			}
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
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Retro Game</title>
</head>
<body>

<?php include('src/header.php'); ?>

<main>
        <section>
            <div>
            <h1>Se connecter</h1>

            <?php if(isset($_SESSION['connect'])) { ?>

                <?php
                if(isset($_GET['success'])){
                    echo'<div class="alert success">Vous êtes maintenant connecté.</div>';
                } ?>

                <?php } else { ?>

                <?php 
                if(isset($_GET['error'])) {
                    if(isset($_GET['message'])) {
                        echo'<div class="alert error">'.htmlspecialchars($_GET['message']).'</div>';
                    }
                } else if(isset($_GET['success'])) {
                    echo'<div class="alert success">Vous êtes maintenant connecté.</div>';
                }}

                ?>
            <form class="login" method="post" action="login_admin.php">
				<input class="login_form" type="email" name="email" placeholder="Votre adresse email" required />
				<input class="login_form" type="password" name="password" placeholder="Mot de passe" required />
				<button class="submit" type="submit">Se connecter</button>
			</form>
            </div>
        </section>
    </main>



<?php include('src/footer.php'); ?>

</body>
</html>