<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="pragma" content="no-cache" />
    <meta name="description" content="Recherchez vos jeux et consoles favoris."/>    
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Recherchez un jeu ou une console</title>
</head>
<body>

<?php include('src/header.php'); ?>

<main class="container_search">
    <form method="post" action="search.php">
        <input class="searchbar" type="text" name="search" placeholder="Recherchez un jeu">
        <div class="searchbutton">
            <button id="buttonsearch">Rechercher</button>
        </div>
    </form>

</main>

<?php include('src/footer.php'); ?>

</body>
</html>