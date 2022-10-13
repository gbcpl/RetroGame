<?php require('src/connect.php'); ?>

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

<?php
    
    $stmt = $db->prepare("SELECT image, game, type, price, console FROM Product");
    $stmt->execute();

?>

    <div class="container">
    <h2>Jeux ajoutés le plus récemment</h2>
        <div class="firstline">
            <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                    <div class="item">
                        <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" height="" width="" alt="mon image" title="image"/>';?>
                        <h3><?php echo htmlspecialchars($row['game']); ?></h3><h3>sur</h3>
                        <h3><?php echo htmlspecialchars($row['console']); ?></h3>
                        <?php echo htmlspecialchars($row['price']); ?>€
                        <button class="boutton_panier" type="button"><a class="liensbutton" href="panier.php?action=ajout&amp;l=<?php echo htmlspecialchars($row['game']); ?>&amp;q=1&amp;p=<?php echo htmlspecialchars($row['price']); ?>" return false;">Ajouter au panier</a>
                    </div>
         <?php endwhile; ?>
        </div>
        <h2>Consoles et Accessoires</h2>
        <div class="secondline">
            <div class="item">
                <a class="items" href=""><img src="img/manetteswitch.jpg"></a>
                <h3>Une manette SWITCH collector</h3>
                <button class="boutton_panier" type="button"><a class="liensbutton" href="panier.php?action=ajout&amp;l=ManetteSwitch&amp;q=1&amp;p=60" return false;">Ajouter au panier</a>
            </div>
            <div class="item">
                <a class="items" href=""><img src="img/xboxseriess.jpg"></a>
                <h3>Xbox Series S</h3>
                <button class="boutton_panier" type="button"><a class="liensbutton" href="panier.php?action=ajout&amp;l=XboxSeriesS&amp;q=1&amp;p=269" return false;">Ajouter au panier</a></button>
            </div>
            <div class="item">
                <a class="items" href=""><img src="img/xboxseriesx.jpg"></a>
                <h3>Xbox Series X</h3>
                <button class="boutton_panier" type="button"><a class="liensbutton" href="panier.php?action=ajout&amp;l=XboxSeriesX&amp;q=1&amp;p=399" return false;">Ajouter au panier</a></button>
            </div>
            <div class="item">
                <a class="items" href=""><img src="img/playstation5.jpg"></a>
                <h3>Playstation 5</h3>
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