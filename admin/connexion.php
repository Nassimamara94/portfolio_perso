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


<h1>Connexion</h1>
<div class="container">
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
</form>


</div>

</body>

</html>