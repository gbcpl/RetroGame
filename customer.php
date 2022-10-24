<?php 

	session_start();

    if (!isset($_SESSION['connect'])) {
        header('location: index.php');
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
    <meta name="description" content="Suivez vos commandes et indiquez vos informations personnelles"/>    
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Page client</title>
</head>
<body>

<?php include('src/header.php'); ?>

    <aside>
        <nav class="navbarleft fixed-left">
        <ul id="navbarul">
                <li class="navbaritems"><h2 class="h2nav">Tableau de bord</h2></li>
                <li class="navbaritems"><a href="customer.php">Accueil</a></li>
                <li class="navbaritems"><a href="customer_infos.php">Mes infos personnelles</a></li>
                <li class="navbaritems"><a href="customer_adresse.php">Mes adresses</a></li>
                <li class="navbaritems"><a href="message.php">Contact</a></li>
                <li class="navbaritems"><a href="logout.php">Déconnexion</a></li>
            </ul>
        </nav>
    </aside>
<main>

    <section class="customer">
        <div class="items_customer">
            <h2>Bienvenue dans votre espace client !</h2>
        </div>

    </section>

</main>
<?php include('src/footer.php'); ?>

</body>
</html>