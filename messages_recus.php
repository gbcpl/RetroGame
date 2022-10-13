<?php require('src/connect.php'); ?>

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
            <li><a href="admin.php">Accueil</a></li>
            <li><a href="create_seller.php">Créer un vendeur</a></li>
            <li><a href="gestion.php">Gérer les commandes</a></li>
            <li><a href="sells.php">Voir le compte rendu des ventes</a></li>
            <li><a href="messages_recus.php">Messagerie admin</a></li>
        </ul>
    </nav>
</aside>


<?php
    
    $stmt = $db->prepare("SELECT text, customer_id, mail FROM Message INNER JOIN Customer WHERE customer_id = customer.id ");
    $stmt->execute();

?>
     <table class="messagesadmin">
        <h4>Mes messages</h4>
     <thead>
       <tr>
         <th>Message</th>
         <th>customer_id</th>
         <th>Mail expéditeur</th>
       </tr>
     </thead>
     <tbody>
       <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
       <tr>
         <td><?php echo htmlspecialchars($row['text']); ?></td>
         <td><?php echo htmlspecialchars($row['customer_id']); ?></td>
         <td><?php echo htmlspecialchars($row['mail']); ?></td>
       </tr>
       <?php endwhile; ?>
     </tbody>
   </table>

<?php include('src/footer.php'); ?>

</body>
</html>