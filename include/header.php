<!-- j'appel la page init(connexion à la BDD) -->
<?php
require_once("init.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CDN Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- CDN font-awesome -->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <!-- lien perso css-->
    <link rel="stylesheet" href="css/style.css">

    <!-- lien de mon icone-->
    <link rel="icon" href="https://img.icons8.com/ios/420/nfc-n-filled.png" type="image/png" />

    <title>portFolio - Nassim-Amara</title>
</head>

<body>

<!--début HEADER -->

<header>
  
      <!--Main Navigation-->
  <nav class="navbar transparent navbar-expand-lg fixed-top">
  
    <div class="container-fluid">

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">A propos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="formation.php">Formations</a>
          </li>
        </ul>
        <li class="nav-item">
            <a class="nav-link" href="formation.php">Compétences</a>
          </li>
        </ul>
        <li class="nav-item">
            <a class="nav-link" href="formation.php">Projets</a>
          </li>
        </ul>
        <li class="nav-item">
            <a class="nav-link" href="formation.php">Contact</a>
          </li>
        </ul>
      </div>
    </div>
    <h3 class="col-md-2" id="nom_header">Nassim Amara</h3>
  </nav>

</header> <!-- Fin Header -->
