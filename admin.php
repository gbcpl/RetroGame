<?php 

    session_start();
    if(!isset($_SESSION['admin']) ) {
		header("Location: index.php?message='vous n'êtes pas administrateur'");
		exit;
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
    <meta name="description" content="Gérez les ventes et les informations de vos clients"/>    
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Page d'administration</title>
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

<h2>Bienvenue dans votre espace administrateur</h2>

<?php include('src/footer.php'); ?>

</body>
</html>