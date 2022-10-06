<?php 

	session_start();
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

    <aside>
        <nav class="navbarleft fixed-left">
            <ul>
                <li><h2>Tableau de bord</h2></li>
                <li><a href="customer.php">Accueil</a></li>
                <li><a href="customer_commands.php">Mes commandes</a></li>
                <li><a href="customer_infos.php">Mes infos personnelles</a></li>
                <li><a href="message.php">Envoyer un message</a></li>
                <li><a href="logout.php">Déconnexion</a></li>

            </ul>
        </nav>
    </aside>
<main>

    <section class="customer">
        <div class="items_customer">
            <h2>Ma dernière commande</h2>
        </div>
        <div class="items_customer">
            <h2>Mes informations perssonnelles</h2>
            <p class="infosperso">Nom</p>
            <p class="infosperso">Prénom</p>
            <p class="infosperso">Email</p>
            <p class="infosperso"><a href="customer_infos.php">Modifier mes données personnelles</a></p>
            
        </div>
    </section>

</main>
<?php include('src/footer.php'); ?>

</body>
</html>