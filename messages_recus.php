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
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Retro Game</title>
</head>
<body>

<?php include('src/header.php');  ?>
  
<aside>
        <nav class="navbarleft fixed-left">
            <ul id="navbaradmin">
                <li><h2 class="h2admin">Tableau de bord</h2></li>
                <li><a href="admin.php">Accueil</a></li>
                <li><a href="create_seller.php">Créer un vendeur</a></li>
                <li><a href="messages_recus.php">Messagerie</a></li>
                <li><a href="logout.php">Déconnexion</a></li>
            </ul>
        </nav>
    </aside>


<?php
    
    $stmt = $db->prepare("SELECT text, customer_id, mail FROM message INNER JOIN customer WHERE customer_id = customer.id ");
    $stmt->execute();

?>
     <table class="messagesadmin">
     <thead>
       <tr>
         <th>Message</th>
         <th>Mail expéditeur</th>
       </tr>
     </thead>
     <tbody>
       <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
       <tr>
         <td><?php echo htmlspecialchars($row['text']); ?></td>
         <td><?php echo htmlspecialchars($row['mail']); ?></td>
       </tr>
       <?php endwhile; ?>
     </tbody>
   </table>

<?php include('src/footer.php'); ?>

</body>
</html>