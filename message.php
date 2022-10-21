<?php

	session_start();
	
	if (!empty($_POST['message'])) {

		require('src/connect.php');

		// CREER VARIABLES
		$message = htmlspecialchars($_POST['message']);
        $customer_id = $_SESSION['customerID'];
		// ENVOI

		$req = $db->prepare("INSERT INTO message(text, customer_id) VALUES (?, ?)");
		$req->execute(array($message, $customer_id));

		header('location: message.php?success=1');
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

    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Retro Game</title>
</head>
<body>

<?php include('src/header.php'); ?>

    <aside>
        <nav class="navbarleft fixed-left">
            <ul id="navbarul">
                <li class="navbaritems"><h2 class="h2nav">Tableau de bord</h2></li>
                <li class="navbaritems"><a href="customer.php">Accueil</a></li>
                <li class="navbaritems"><a href="customer_commands.php">Mes commandes</a></li>
                <li class="navbaritems"><a href="customer_infos.php">Mes infos personnelles</a></li>
                <li class="navbaritems"><a href="customer_adresse.php">Mes adresses</a></li>
                <li class="navbaritems"><a href="message.php">Contact</a></li>
                <li class="navbaritems"><a href="logout.php">Déconnexion</a></li>
            </ul>
        </nav>
    </aside>
    <form class="messagerie" method="post" action="message.php">
        <label class="labelmessage">Votre message</label>
        <textarea rows="10" cols="30" name="message" maxlength="400"></textarea>
        <input type="submit">
    </form>

<?php include('src/footer.php'); ?>

</body>
</html>