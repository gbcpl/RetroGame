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

                <?php if(isset($_GET['error'])) {
                    
                    if(isset($_GET['message'])) {
                        echo'<div class="alert error">'.htmlspecialchars($_GET['message']).'</div>';
                    } 
                    } else if (isset($_GET['success'])) {
                    echo'<div class="alert success">Vous êtes désormais inscrit. <a href="index.php">Connectez-vous</a>.</div>';
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

<aside>
        <nav class="navbarleft fixed-left">
            <ul>
                <li><h2>Tableau de bord</h2></li>
                <li><a href="admin.php">Accueil</a></li>
                <li><a href="create_seller.php">Créer un vendeur</a></li>
                <li><a href="gestion.php">Gérer les commandes</a></li>
                <li><a href="sells.php">Voir le compte rendu des ventes</a></li>
                <li><a href="messages.php">Messagerie</a></li>
            </ul>
        </nav>
    </aside>



    
<?php include('src/footer.php'); ?>

</body>
</html>