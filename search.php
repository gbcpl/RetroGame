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
<div class="searchbutton">

    <div class="search1">
        <select name="consoles" id="console-select">
        <option value="">Choisissez une console</option>
        <option value="ps5">PlayStation 5</option>
        <option value="xboxs">Xbox Serie S</option>
        <option value="switch">Nintendo Switch</option>
        <option value="xboxx">Xbox Series X</option>
        <option value="ps4">PlayStation 4</option>
        <option value="xboxone">Xbox One</option>
        </select>
        <select name="genre" id="genre-select">
        <option value="">Genre</option>
        <option value="strat">Stratégie</option>
        <option value="act">Action</option>
        <option value="fps">FPS</option>
        <option value="reflex">Réflexion</option>
        <option value="jdr">Jeux de rôles</option>
        <option value="mmo">MMORPG</option>
        </select>
    </div>
    <div class="search2">
        <select name="retro" id="retro-select">
        <option value="">Consoles rétro</option>
        <option value="ms">Master System</option>
        <option value="ps1">Playstation 1</option>
        <option value="ps2">Playstation 2</option>
        <option value="saturn">Saturn</option>
        <option value="wii">Wii</option>
        <option value="xbox">Xbox</option>
        </select>
        <select name="annee" id="annee-select">
        <option value="">Année de sortie</option>
        <option value="2020">2020s</option>
        <option value="2010">2010s</option>
        <option value="2000">2000s</option>
        <option value="1990">1990s</option>
        <option value="1980">1980s</option>
        <option value="1970">1970s</option>
        </select>
    </div>
    <button id="buttonsearch">Rechercher</button>
</div>
</main>

<?php include('src/footer.php'); ?>

</body>
</html>