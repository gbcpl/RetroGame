<?php require('src/connect.php'); 

  session_start();

    if (!isset($_SESSION['connect'])) {
    header('location: index.php');
    exit();
}	
	if (!empty($_POST['number']) && !empty($_POST['street']) && !empty($_POST['city']) && !empty($_POST['postal_code'])) {

		// CREER VARIABLES
	$number = htmlspecialchars($_POST['number']);
    $street = htmlspecialchars($_POST['street']);
    $city = htmlspecialchars($_POST['city']);
    $postal_code = htmlspecialchars($_POST['postal_code']);
    $id = ($_SESSION['customerID']);

		// ENVOI
    
    $req= $db->prepare("INSERT INTO address_customer (number, street, city, postal_code) VALUES (?, ?, ?, ?)");
    $req->execute(array($number, $street, $city, $postal_code));

		header('location: customer_adresse.php?success=1');
		exit();

	}

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
    <meta name="description" content="Modifiez vos informations personnelles sur Rétro Game"/>    
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Retro Game - Mes informations personnelles</title>
</head>
<body>

<?php include('src/header.php'); ?>

    <aside>
        <nav class="navbarleft fixed-left">
            <ul id="navbarul">
                <li class="navbaritems"><h2 class="h2nav">Tableau de bord</h2></li>
                <li class="navbaritems"><a href="customer.php">Accueil</a></li>
                <li class="navbaritems"><a href="customer_commands.php">Mes commandes</a></li>
                <li class="navbaritems"><a href="customer_infos.php">Mes infos personnelles</a></li>
                <li class="navbaritems"><a href="customer_adresse.php">Mes adresses</a></li>
                <li class="navbaritems"><a href="message.php">Contact</a></li>
                <li class="navbaritems"><a href="logout.php">Déconnexion</a></li>
            </ul>
        </nav>
    </aside>

<main class="customer_infosperso">
    
    
<?php
    
  $stmt = $db->prepare("SELECT * FROM address_customer INNER JOIN customer WHERE customer.id = ?");
  $stmt->execute(array($_SESSION['customerID']));
?>

<div class="infosperso">
 <table>
 <h2>Mon adresse</h2>
   <thead class="tabcustomer">
     <tr>
       <th class="tabcustomer">Numéro</th>
       <th class="tabcustomer">Rue</th>
       <th class="tabcustomer">Ville</th>
       <th class="tabcustomer">Code postal</th>
     </tr>
   </thead>
   <tbody>
     <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
     <tr>
       <td><?php echo htmlspecialchars($row['number']); ?></td>
       <td><?php echo htmlspecialchars($row['street']); ?></td>
       <td><?php echo htmlspecialchars($row['city']); ?></td>
       <td><?php echo htmlspecialchars($row['postal_code']); ?></td>
     </tr>
     <?php endwhile; ?>
   </tbody>
 </table>
      <h2 class="titreh2">Modifier mon adresse</h2>
      <div class="modifierinfos">
        <form id="adressechange" method="POST" action="customer_adresse.php">

          <ul id="adresse">      
            <li><input type="number" name="number" placeholder="Numéro de rue"></input></li>
            <li><input type="text" name="street" placeholder="Nom de rue"></input></li>
            <li><input type="text" name="city" placeholder="Ville"></input></li>
            <li><input type="number" name="postal_code" placeholder="Code postal"></input></li>
          </ul>
          <input type="submit">
        </form> 

      </div>
</main>

<?php include('src/footer.php'); ?>

</body>
</html>