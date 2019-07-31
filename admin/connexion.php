<?php
require_once("../include/init.php");
?>
<!DOCTYPE html>
<html lang="fr">
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
    <title>admin</title>
</head>
<body>



<!-- <div class="container">
<form class="col-md-4 offset-md-4" method="post" action="" class="col-md-4 offset-md-4 text-center">
    <div class="form-group">
        <label for="email_pseudo">Email ou pseudo</label>
        <input type="text" class="form-control" id="email_pseudo" name="email_pseudo" placeholder="Enter email_pseudo">
    </div>
    <div class="form-group">
        <label for="mdp">Mot De Passe</label>
        <input type="text" class="form-control" id="mdp" name="mdp" placeholder="Password">
    </div>


    <button type="submit" class="btn btn-primary col-md-12">Connexion</button>
</form> -->

<section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase ecart_titre">Contactez-moi</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <form action="index.php" class="formulaire_connexion" method="post">

              <p class="formulaire"></p>
              <input type="text" class="formulaire_connexion" id="nom" name="nom" value="">
              <label for ="" class="formulaire_label">Nom</label>
              <div class="validation"></div>

              <input type="text" class="formulario_input" name="prenom">
              <label for ="" class="formulaire_label">Prénom</label>
              <div class="validation"></div>

              <p class="formulaire"></p>
              <input type="email" class="formulaire_input" id="email" name="email" value="">
              <label for ="" class="formulaire_label">E-mail</label>
              <div class="validation"></div>

              <p class="formulaire"></p>
              <input type="text" class="formulaire_input" id="message" name="message" value="">
              <label for ="" class="formulaire_label">Commentaire</label>
              <div class="validation"></div>

              <input type="submit" class="formulaire_submit">
            </form>
          </div>
        </div>
      </div>
    </section>
</div>

</body>

</html>