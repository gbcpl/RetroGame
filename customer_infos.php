

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
            </ul>
        </nav>
    </aside>

<main class="customer_infosperso">
    
    
    <?php
  $host = 'localhost';
  $dbname = 'retrogame';
  $username = 'root';
  $password = 'root';
    
  $dsn = "mysql:host=$host;dbname=$dbname"; 
  // récupérer tous les utilisateurs
  $sql = "SELECT * FROM Customer WHERE ID = 1";
   
  try{
   $pdo = new PDO($dsn, $username, $password);
   $stmt = $pdo->query($sql);
   
   if($stmt === false){
    die("Erreur");
   }
   
  }catch (PDOException $e){
    echo $e->getMessage();
  }
?>
<div class="infosperso">
 <table>
 <h2>Mes informations personnelles</h2>
   <thead class="tabcustomer">
     <tr>
       <th class="tabcustomer">ID</th>
       <th class="tabcustomer">Prénom</th>
       <th class="tabcustomer">Nom</th>
       <th class="tabcustomer">Mail</th>
       <th class="tabcustomer">Adresse</th>
       <th class="tabcustomer">Téléphone</th>
     </tr>
   </thead>
   <tbody>
     <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
     <tr>
       <td><?php echo htmlspecialchars($row['id']); ?></td>
       <td><?php echo htmlspecialchars($row['first_name']); ?></td>
       <td><?php echo htmlspecialchars($row['last_name']); ?></td>
       <td><?php echo htmlspecialchars($row['mail']); ?></td>
       <td><?php echo htmlspecialchars($row['address_id']); ?></td>
       <td><?php echo htmlspecialchars($row['phone_nb']); ?></td>


     </tr>
     <?php endwhile; ?>
   </tbody>
 </table>
      <h2 class="titreh2">Modifier mes informations personnelles</h2>
      <div class="modifierinfos">
        <form class="formulaireinfos" method="POST">
          <ul>
            <li><input type="text" name="lastname" placeholder="Nom"></input></li>
            <li><input type="text" name="firstname" placeholder="Prénom"></input></li>
            <li><input type="tel" name="phone_nb" placeholder="Téléphone"></input></li>
            <li><input type="email" name="email" placeholder="Mail"></input></li>
          </ul>
          <ul>      
            <li><input type="number" name="streetnumber" placeholder="Numéro de rue"></input></li>
            <li><input type="text" name="street" placeholder="Nom de rue"></input></li>
            <li><input type="text" name="city" placeholder="Ville"></input></li>
            <li><input type="number" name="postalcode" placeholder="Code postal"></input></li>
          </ul>
          <input type="submit">
        </form>
        
        </div>
     </div>
</main>


<?php include('src/footer.php'); ?>

</body>
</html>