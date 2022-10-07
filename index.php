<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="pragma" content="no-cache" />
    <meta name="description" content="La meilleure boutique de jeux vidéo !"/>    
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Retro Game - Boutique de jeux vidéo</title>
</head>
<body>

<?php include('src/header.php'); ?>

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="img/RetroGame.png" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/ps5.png" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/RetroGame.png" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>






    <div class="container">
        <div class="nouveautes">
            <h2>Nouveautés</h2>
                <div class="firstline">
                    <div class="item">
                        <a class="items" href=""><img src="img/lifeisstrange.jpg"></a>
                        <h4>Life is Strange sur Switch</h4>
                        <button class="boutton_panier" type="button"><a class="liensbutton" href="panier.php?action=ajout&amp;l=Life is Strange&amp;q=1&amp;p=30" return false;>Ajouter au panier</a></button>
                    </div>
                <div class="item">
                        <a class="items" href=""><img src="img/internaldrift.jpg"></a>
                        <h4>Inertial Drift sur PS5</h4>
                        <button class="boutton_panier" type="button"><a class="liensbutton" href="panier.php?action=ajout&amp;l=InternalDrift&amp;q=1&amp;p=60" return false;>Ajouter au panier</a></button>
                </div>
            <div class="item">
                <a class="items" href=""><img src="img/pathfinder.jpg"></a>
                <h4>Pathfinder sur Xbox ONE</h4>
                <button class="boutton_panier" type="button"><a class="liensbutton" href="panier.php?action=ajout&amp;l=PathFinder&amp;q=1&amp;p=50" return false;>Ajouter au panier</a></button>
            </div>
            <div class="item">
                <a class="items" href=""><img src="img/valkyrieelysium.jpg"></a>
                <h4>Valkyrie Elysium sur PS4</h4>
                <button class="boutton_panier" type="button"><a class="liensbutton" href="panier.php?action=ajout&amp;l=ValkyrieElysium&amp;q=1&amp;p=40" return false;>Ajouter au panier</a></button>
            </div>
        </button>
        </div>
        </div>
        <h2>Consoles et Accessoires</h2>
        <div class="secondline">
            <div class="item">
                <a class="items" href=""><img src="img/manetteswitch.jpg"></a>
                <h4>Une manette SWITCH collector</h4>
                <button class="boutton_panier" type="button"><a class="liensbutton" href="panier.php?action=ajout&amp;l=ManetteSwitch&amp;q=1&amp;p=60" return false;">Ajouter au panier</a>
            </div>
            <div class="item">
                <a class="items" href=""><img src="img/xboxseriess.jpg"></a>
                <h4>Xbox Series S</h4>
                <button class="boutton_panier" type="button"><a class="liensbutton" href="panier.php?action=ajout&amp;l=XboxSeriesS&amp;q=1&amp;p=269" return false;">Ajouter au panier</a></button>
            </div>
            <div class="item">
                <a class="items" href=""><img src="img/xboxseriesx.jpg"></a>
                <h4>Xbox Series X</h4>
                <button class="boutton_panier" type="button"><a class="liensbutton" href="panier.php?action=ajout&amp;l=XboxSeriesX&amp;q=1&amp;p=399" return false;">Ajouter au panier</a></button>
            </div>
            <div class="item">
                <a class="items" href=""><img src="img/playstation5.jpg"></a>
                <h4>Playstation 5</h4>
                <button class="boutton_panier" type="button"><a class="liensbutton" href="panier.php?action=ajout&amp;l=Playstation5&amp;q=1&amp;p=399"  return false;">Ajouter au panier</a></button>
            </div>
            <div>
        </button>
        </div>
        </div>
        
        </button>
        </div>
        </div>
    </div>

    <?php include('src/footer_homepage.php'); ?>

</body>
</html>