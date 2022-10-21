<?php require('src/connect.php'); 
    
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
    <link rel="icon" type="image/x-icon" href="img/favicon.ico">
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
                        <?php echo '<img class="images" src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" alt="mon image" title="image"/>';?>
                        <h3><?php echo htmlspecialchars($row['game']); ?></h3><h3>sur</h3>
                        <h3><?php echo htmlspecialchars($row['console']); ?></h3>
                        <?php echo htmlspecialchars($row['price']); ?>€
                        <button class="boutton_panier" type="button"><a class="liensbutton" href="panier.php?action=ajout&amp;l=<?php echo htmlspecialchars($row['game']); ?>&amp;q=1&amp;p=<?php echo htmlspecialchars($row['price']); ?>" return false;">Ajouter au panier</a>
                    </div>
         <?php endwhile; ?>
            </div>
    </div>

    <?php include('src/footer_homepage.php'); ?>

</body>
</html>