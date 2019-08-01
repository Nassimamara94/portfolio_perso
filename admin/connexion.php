<?php
require_once("../include/init.php");
// Je me connecte à ma BDD
// a-j'appel ma table admin
$resultat=$bdd->query("SELECT * FROM admin");
// b- je manipule les objets de ma table admin
$admin=$resultat->fetch(PDO::FETCH_ASSOC);
// je fais les vérification du form et des champs 
extract($_POST);

if($_POST){
  if(empty($u_pseudo) && $u_pseudo !== $admin['u_pseudo'] && empty($u_password) && $u_password !== $admin['u_password'] 
  && $admin['statut'] !== 1 ){

    
    header('Location:https://getbootstrap.com/');
  }else{
    header('Location:accueil_admin.php');
  }
} // FIN if($_POST)

?> 

<!-- contenu HTML-->
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



   <h1 class="display-4 text-center">Identification</h1><br><br>

   <!-- Je réalise un formulaire de connexion avec les champs pseudo/mot de passe/confirmer mot de passe bouton submit -->

   <!-- Les balises <form> sert à dire que c'est un formulaire
on lui demande de faire fonctionner la page connexion.php une fois le bouton "Connexion" cliqué
on lui dit également que c'est un formulaire de type "POST" -->
<div class="container">
  <form class="col-md-4 offset-md-4" method="post" class="col-md-4 offset-md-4 text-center">

<div class="form-group">
           <label for="pseudo" class="text-white">pseudo</label>
          <input type="text" class="form-control" style="background-color:transparent" id="prenom" name="u_pseudo" placeholder="Enter prenom"> 
        </div>

  <!-- on met un type="password" afin que le text soit illisible à l'écran -->
     <div class="form-group">
      <label for="mdp" class="text-white">mot de passe</label>
      <input type="password" class="form-control" style="background-color:transparent" id="mdp" name="u_password" placeholder="Enter password">
  </div><br>

<!-- type="submit" sera un bouton pour valider le formulaire name="nom de l'input" sert à le reconnaitre une fois le bouton submit cliqué, pour le code PHP
 -->
  <button type="submit" name="connexion" class="btn btn-secondary col-md-12" style="background-color:transparent" >Connexion</button>

  </form>
  </div>

</body>

</html>