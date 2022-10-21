<?php require('src/connect.php'); 
  session_start();
  if(!isset($_SESSION['seller']) ) {
    header("Location: index.php?message='vous n'êtes pas vendeur'");
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


<?php include('src/footer.php'); ?>

</body>
</html>