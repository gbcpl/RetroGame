<?php require('src/connect.php'); 

	session_start();
	
	if (!empty($_POST['last_name']) && !empty($_POST['first_name']) && !empty($_POST['phone_nb']) && !empty($_POST['mail'])) {

		// CREER VARIABLES
		$last_name = htmlspecialchars($_POST['last_name']);
    $first_name = htmlspecialchars($_POST['first_name']);
    $phone_nb = ($_POST['phone_nb']);
    $mail = htmlspecialchars($_POST['mail']);

		// ENVOI
    $database = mysqli_connect("localhost", "root", "root", "retrogame");

    $req=mysqli_query($database, "INSERT INTO Customer (last_name, first_name, phone_nb, mail) VAUES ($last_name, $first_name, $phone_nb, $mail) WHERE id = 1");

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
            <ul>
                <li><h2>Tableau de bord</h2></li>
                <li><a href="customer.php">Accueil</a></li>
                <li><a href="customer_commands.php">Mes commandes</a></li>
                <li><a href="customer_infos.php">Mes infos personnelles</a></li>
                <li><a href="message.php">Envoyer un message</a></li>
                <li><a href="logout.php">Déconnexion</a></li>
            </ul>
        </nav>
    </aside>

<main class="customer_infosperso">
    
    
<?php
    
  $stmt = $db->prepare("SELECT * FROM Customer WHERE ID = 1");
  $stmt->execute();
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
        <form class="formulaireinfos" method="POST" action="customer_infos.php">
          <ul>
            <li><input type="text" name="last_name" placeholder="Nom"></input></li>
            <li><input type="text" name="first_name" placeholder="Prénom"></input></li>
            <li><input type="tel" name="phone_nb" placeholder="Téléphone"></input></li>
            <li><input type="email" name="mail" placeholder="Mail"></input></li>
          </ul>
          <input type="submit">
        </form>
        <form>

        <!--  <ul>      
            <li><input type="number" name="streetnumber" placeholder="Numéro de rue"></input></li>
            <li><input type="text" name="street" placeholder="Nom de rue"></input></li>
            <li><input type="text" name="city" placeholder="Ville"></input></li>
            <li><input type="number" name="postalcode" placeholder="Code postal"></input></li>
          </ul>
          <input type="submit">
        </form> -->

      </div>
</main>


<?php include('src/footer.php'); ?>

</body>
</html>