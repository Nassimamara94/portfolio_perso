<!-- j'appelle les pages init (connexion à la bdd) et le header -->
<?php
require_once("include/init.php");
// require_once("include/header.php");
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
    <link rel="icon" href="https://img.icons8.com/ios/420/nfc-n-filled.png" type="image/png"/>

    <title>portFolio - Nassim Amara</title>
</head>


<body id="contact">

<!-- <main class="container">

<div class="row">
  <h1 class="display-4text-center">Formulaire de Contact </h1>
</div>


</main> -->

<!-- <main class="main_contact">
  <div class="row">
    <h1 class="display-4 text-center"> Formulaire de Contact </h1>

  </div>
  
   
    <div class="container">
       
      <form class="col-md-4 offset-md-4" method="post" >
        <div class="form-group">
            <label for="objet">Objet</label>
            <input type="objet" class="form-control" id="objet" name="objet" placeholder="Enter objet">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="message">Message</label>
            <input type="text" class="form-control" id="message" name="message" row="3"placeholder="Enter message">
          </div>
          

          <button type="submit" name="submit" class="col -md-12 btn btn-primary mb-4">Submit</button>
        </form>
    </div> FIN .container
    
  
j'appelle la page footer -->
</body>
</html>
<?php 
require_once("include/footer.php");
?>