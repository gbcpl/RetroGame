<?php require('src/connect.php'); 

  session_start();

    if (!isset($_SESSION['connect'])) {
    header('location: index.php');
    exit();
}	
	if (!empty($_POST['last_name']) && !empty($_POST['first_name']) && !empty($_POST['phone_nb']) && !empty($_POST['mail'])) {

		// CREER VARIABLES
		$last_name = htmlspecialchars($_POST['last_name']);
    $first_name = htmlspecialchars($_POST['first_name']);
    $phone_nb = htmlspecialchars($_POST['phone_nb']);
    $mail = htmlspecialchars($_POST['mail']);
    $id = ($_SESSION['customerID']);

		// ENVOI
    
    $req= $db->prepare("UPDATE customer SET last_name = ?, first_name = ?, phone_nb = ?, mail = ? WHERE id = ?");
    
    $req->execute(array($last_name, $first_name, $phone_nb, $mail, $id));

		header('location: customer_infos.php?success=1');
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
                <li class="navbaritems"><a href="customer_infos.php">Mes infos personnelles</a></li>
                <li class="navbaritems"><a href="customer_adresse.php">Mes adresses</a></li>
                <li class="navbaritems"><a href="message.php">Contact</a></li>
                <li class="navbaritems"><a href="logout.php">Déconnexion</a></li>
            </ul>
        </nav>
    </aside>

<main class="customer_infosperso">
    
    
<?php
    
  $stmt = $db->prepare("SELECT * FROM customer WHERE id = ?");
  $stmt->execute(array($_SESSION['customerID']));
?>

<div class="infosperso">
 <table>
 <h2>Mes informations personnelles</h2>
   <thead class="tabcustomer">
     <tr>
       <th class="tabcustomer">Prénom</th>
       <th class="tabcustomer">Nom</th>
       <th class="tabcustomer">Mail</th>
       <th class="tabcustomer">Téléphone</th>

     </tr>
   </thead>
   <tbody>
     <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
     <tr>
       <td><?php echo htmlspecialchars($row['first_name']); ?></td>
       <td><?php echo htmlspecialchars($row['last_name']); ?></td>
       <td><?php echo htmlspecialchars($row['mail']); ?></td>
       <td><?php echo htmlspecialchars($row['phone_nb']); ?></td>
     </tr>
     <?php endwhile; ?>
   </tbody>
 </table>
      <h2 class="titreh2">Modifier mes informations personnelles</h2>
      <div class="modifierinfos">
        <form class="formulaireinfos" method="POST" action="customer_infos.php">
          <ul id="infoperso">
            <li><input type="text" name="last_name" placeholder="Nom"></input></li>
            <li><input type="text" name="first_name" placeholder="Prénom"></input></li>
            <li><input type="tel" name="phone_nb" placeholder="Téléphone"></input></li>
            <li><input type="email" name="mail" placeholder="Mail"></input></li>
          </ul>
          <input type="submit">
        </form>

      </div>
</main>

<?php include('src/footer.php'); ?>

</body>
</html>