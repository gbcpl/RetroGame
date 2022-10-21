<?php

	session_start();
	
    if(!isset($_SESSION['seller']) ) {
        header("Location: index.php?message='vous n'êtes pas vendeur'");
        exit;
    }

	require('src/log.php');


	if (!empty($_POST['game']) && !empty($_POST['type']) && !empty($_POST['price'] && !empty($_POST['console']))) {

		require('src/connect.php');

		// CREER VARIABLES
		$game = htmlspecialchars($_POST['game']);
		$type = htmlspecialchars($_POST['type']);
		$price = htmlspecialchars($_POST['price']);
		$console = htmlspecialchars($_POST['console']);
        $image = file_get_contents($_FILES['image']['tmp_name']);
		$sellerID = htmlspecialchars($_POST['sellerID']);


		// ENVOI

		$req = $db->prepare("INSERT INTO Product(game, type, price, console, image) VALUES (?, ?, ?, ?, ?)");
		$req->execute(array($game, $type, $price, $console, $image));

		header('location: create_product.php?success=1');
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
    <meta name="description" content="Ajoutez un produit à la liste de notre catalogue."/>    
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Retro Game</title>
</head>
<body>

<?php include('src/header.php'); ?>

<aside>
        <nav class="navbarleft fixed-left">
            <ul id="navbarseller">
                <li><h2 class="h2seller">Tableau de bord</h2></li>
                <li><a href="seller.php">Accueil</a></li>
                <li><a href="create_product.php">Créer un produit</a></li>
                <li><a href="logout.php">Déconnexion</a></li>
            </ul>
        </nav>
    </aside>

<main>    

    <form enctype="multipart/form-data" class="product" method="post" action="create_product.php">
				<input class="productform" type="text" name="game" placeholder="Jeu vidéo" required />
                <input class="productform" type="text" name="type" placeholder="Type de jeu" required />
				<input class="productform" type="number" name="price" placeholder="Prix" required />
                <input class="productform" type="text" name="console" placeholder="Console" required />
                <input class="productform" type="file" name="image" required />                                
				<button class="submit" type="submit">Créer un produit</button>
	</form>
</main>



<?php include('src/footer.php'); ?>

</body>
</html>