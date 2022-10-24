<?php

session_start();

include 'src/connect.php';

$searchErr = '';
$product ='';
if(isset($_POST['save']))
{
    if(!empty($_POST['search']))
    {
        $search = $_POST['search'];

        $stmt = $db->prepare("SELECT * FROM product WHERE game LIKE '%$search%' OR console LIKE '%$search%'");
        $stmt->execute($save);
        $product = $stmt->fetchAll(PDO::FETCH_ASSOC);
         
    }
    else
    {
        $searchErr = "Please enter the information";
    }
     
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
    <meta name="description" content="Recherchez vos jeux et consoles favoris."/>    
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Recherchez un jeu ou une console</title>
</head>
<body>

<?php include('src/header.php'); ?>

<main class="container_search">
    <form method="post" action="search.php" class="searchbar">
        <input class="search type="text" name="search" placeholder="Recherchez un jeu">
        <div class="searchbutton">
            <button class="buttonsearch" type="submit" name="save">Rechercher</button>
        </div>
    </form>
</main>

<div class="table-responsive">          
      <table class="table">
        <thead>
          <tr>
            <th>Jeu</th>
            <th>Console</th>
            <th>Prix</th>
          </tr>
        </thead>
<?php

    

    if($product){
    
       foreach($product as $key=>$value)
       {
           ?>
       <tr>
           <td><?php echo $value['game'];?></td>
           <td><?php echo $value['console'];?></td>
           <td><?php echo $value['price'];?></td>
       </tr>
            
           <?php
       }} 
    ?>

</table>
<?php include('src/footer.php'); ?>

</body>
</html>