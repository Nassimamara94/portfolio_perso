<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <!-- lien Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- lien perso css-->
    <link rel="stylesheet" href="../css/admin_style.css">
    <!-- lien de mon icone-->
    <link rel="icon" href="https://img.icons8.com/ios/420/nfc-n-filled.png" type="image/png" />
    <title>Accueil Admin</title>
</head>
<body>
 
<div class="container">

<h1 class="text-center text-primary alert alert-warning mt-5">Accueil Admin</h1>

<section class="tabledesmatieres offset-4" >

<div class="card m-10 card_admin" style="width: 18rem;box-shadow:10px 10px 10px black;">
  <ul class="list-group list-group-flush">
    <li class="list-group-item">
      <a href="gestion_projects.php">Gestion Projets</a>
    </li>
    <li class="list-group-item">
      <a href="gestion_formation.php">Gestion Formation</a>
    </li>
    <li class="list-group-item">
      <a href="gestion_competence.php">Gestion Compétence</a>
    </li>
    <li class="list-group-item">
      <a href="gestion_professional_experience.php">Gestion Expériences Professionnel</a>
    </li>
    <li class="list-group-item">
      <a href="gestion_langage.php">Gestion Langages</a>
    </li>
  </ul>
</div>
</section>

</div> <!-- fin container -->
</body>
</html>