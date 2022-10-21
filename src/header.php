<header class="top-nav fixed-top">
      <a href="index.php"><img id="logo" src="img/logo.png"></a>
    <input id="menu-toggle" type="checkbox" />
    <ul class="menu">
      <li><h3><a class="nav-item" href="index.php">Accueil</a></h3></li>
      <li><h3><a class="nav-item" href="search.php">Rechercher</a></h3></li>

<?php

  if (isset($_SESSION['connect']) && !isset($_SESSION['admin']) == 1 && !isset($_SESSION['seller']) == 1) { ?>
      <li><a class="nav-item" href="customer.php"><button class="buttonheader nav-item">Espace client</button></a></li>
  <?php
  } elseif (isset($_SESSION['admin']) == 1) { ?>
      <li><a class="nav-item" href="admin.php"><button class="buttonheader nav-item">Espace administrateur</button></a></li>
  <?php } elseif (isset($_SESSION['seller']) == 1) { ?>
      <li><a href="seller.php"><button class="buttonheader nav-item">Espace vendeur</button></a></li>
  <?php } else { ?>       
      <li><a class="nav-item" href="login.php"><button class="buttonheader nav-item">Se connecter</button></a></li>
  <?php }  ?>
    <?php if (!isset($_SESSION['connect'])) { ?>
        <li><a class="nav-item" href="signin.php"><button class="buttonheader nav-item">S'inscrire</button></a></li>
    <?php } elseif (isset($_SESSION['seller']) == 1 || (isset($_SESSION['admin']) == 1) || (isset($_SESSION['connect'])))  { ?>
      <li><a class="nav-item" href="logout.php"><button class="buttonheader nav-item">Se déconnecter</button></a></li>
    <?php }  ?>
        </ul>
    <a href="panier.php"><img src="img/basket.png" alt="panier" class="buttonheader nav-item panier_icon"></a>
    <label class='menu-button-container' for="menu-toggle">
      <div class='menu-button'></div>
    </label>
  </header>