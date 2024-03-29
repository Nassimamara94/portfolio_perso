<?php

require_once("include/init.php");
require_once("include/header.php");
extract($_POST);
$errorNom ='';
$errorPrenom ='';
$errorEmail ='';
$errorTelephone ='';
$errorObjet ='';
$errorMessage ='';
  // echo  '<pre style="color:white;">'; print_r($_POST); echo '</pre>';
// vérification de champ du formulaire

if($_POST){ // si on valide le formulaire, on entre dans le IF

   if(empty($nom) || iconv_strlen($nom) <2 || iconv_strlen($nom) > 30) {
    $errorNom .= '<span class="col text-danger text-center"> Saisissez un Nnom valide 30 caractères max</span>';
   }

   if(empty($prenom)  || iconv_strlen($prenom) <2 || iconv_strlen($prenom) > 30) { 
    $errorPrenom .= '<span class="col text-danger text-center"> Saisissez un Prénom valide 30 caractères max.</span>';
   }

   if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errorEmail .= '<span class="col text-danger text-center"> Email non Valide</span>';
   } 

   if(!preg_match('#^[0-9]{10}+$#', $telephone)){ // debut et fin de chaine de caractère c le '#' on lui dit entre accolade 10 caractère,et le + c'est pour dire qu'il peut l'utiliser plusieurs fois
   $errorTelephone .= '<span class="col text-danger text-center">Téléphone non valide, caractères non autorisés !! </span>';
  }

   if(empty($objet) && iconv_strlen($objet) <2 || iconv_strlen($objet) >40) {
     $errorObjet .='<span class="col text-danger text-center">Vous n\'avez pas saisie le sujet de votre message</span>';
   }
   if(empty($message) || iconv_strlen($message) >255) {
     $errorMessage  .='<span class="col text-danger text-center">Vous n\'avez pas saisie le sujet de votre message</span>';
   }

   // insérer en BDD si y'a pas d'erreur
   if(empty($errorNom) && empty ($errorPrenom) && empty($errorEmail))
       {
         $newVisiteur = $bdd->prepare("INSERT INTO contact(nom,prenom,email,telephone,objet,message) VALUES (:nom, :prenom, :email,:telephone, :objet, :message)");
         $newVisiteur->bindvalue(':nom', $nom, PDO::PARAM_STR);
         $newVisiteur->bindvalue(':prenom', $prenom, PDO::PARAM_STR);
         $newVisiteur->bindvalue(':email', $email, PDO::PARAM_STR);
         $newVisiteur->bindvalue(':telephone', $telephone, PDO::PARAM_STR);
         $newVisiteur->bindvalue(':objet', $objet, PDO::PARAM_STR);
         $newVisiteur->bindvalue(':message', $message, PDO::PARAM_STR);
         $newVisiteur->execute();
         $validate .='<div class="alert alert-success">Votre message a bien été envoyé</div>';
       }
   

  //
  
} // Fin If($_post)
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

 <main class="container">
   <h1 class="mt-5 offset-3">Pour me contacter, merci de remplir ce formulaire</h1>

<div class="row">
  <div class="col-md-6">
   
    
  </div>
 <form class="col-md-8 offset-md-3 mt-5" method="post">
   <div class="form-group">
     <label for="objet">Nom</label>
     <?= $errorPrenom;?>
            <input type="text" class="form-control" id="objet" name="prenom" >
          </div>
        <div class="form-group">
            <label for="objet">Prénom</label>
            <?= $errorNom;?>
            <input type="text" class="form-control" id="objet" name="nom" >
          </div>
           <div class="form-group">
            <label for="email">Email</label>
            <?= $errorEmail;?>
            <input type="text" class="form-control" id="email" name="email" >
          </div>
           <div class="form-group">
           <label for="telephone">Telephone</label>
           <?= $errorTelephone;?>
           <input type="text" class="form-control" id="telephone" name="telephone">
          </div>
        <div class="form-group">
            <label for="objet">Objet</label>
            <?= $errorObjet;?>
            <input type="text" class="form-control" id="objet" name="objet" >
          </div>
         
          <div class="form-group">
            <label for="message">Message</label>
            <?= $errorMessage;?>
            <textarea class="form-control" name="message" rows="3"></textarea>
          </div>
          

          <button type="submit" class="col -md-12 btn btn-primary mb-4">Envoyer</button>
        </form>
            
</div>

</main>

</body>
</html>
<?php 
require_once("include/footer.php");
?>