<?php

require_once("include/init.php");
extract($_POST);
$errorNom ='';
$errorPrenom ='';
$errorEmail ='';
$errorTelephone ='';
$errorObjet ='';
$errorMessage ='';
  // echo  '<pre style="color:white;">'; print_r($_POST); echo '</pre>';
// vérification de champ du formulaire

/*
    	********************************************************************************************
    	CONFIGURATION
    	********************************************************************************************
    */
    // destinataire est votre adresse mail. Pour envoyer à plusieurs à la fois, séparez-les par une virgule
    $destinataire = 'nassim.amara@lepoles.com';

    // copie ? (envoie une copie au visiteur)
    $copie = 'oui'; // 'oui' ou 'non'

    // Messages de confirmation du mail
    $message_envoye = "Votre message nous est bien parvenu !";
    $message_non_envoye = "L'envoi du mail a échoué, veuillez réessayer SVP.";

    // Messages d'erreur du formulaire
    $message_erreur_formulaire = "Pour me contacter, merci de remplir ce formulaire<a href=\"contact.php\"> </a>.";
    $message_formulaire_invalide = "Vérifiez que tous les champs soient bien remplis et que l'email soit sans erreur.";

    /*
    	********************************************************************************************
    	FIN DE LA CONFIGURATION
    	********************************************************************************************
    */

     // on teste si le formulaire a été soumis
     if (!isset($_POST['envoi'])) {
        // formulaire non envoyé
        echo '<h1 class="text-center mt-4">' . $message_erreur_formulaire . '</h1>' . "\n";
    } else {
        /*
    	 * cette fonction sert à nettoyer et enregistrer un texte
    	 */
        function Rec($text)
        {
            $text = htmlspecialchars(trim($text), ENT_QUOTES);
            if (1 === get_magic_quotes_gpc()) {
                $text = stripslashes($text);
            }

            $text = nl2br($text);
            return $text;
        };

          /*
    	 * Cette fonction sert à vérifier la syntaxe d'un email
    	 */
        function IsEmail($email)
        {
            $value = preg_match('/^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!\.)){0,61}[a-zA-Z0-9_-]?\.)+[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!$)){0,61}[a-zA-Z0-9_]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/', $email);
            return (($value === 0) || ($value === false)) ? false : true;
        }

         // formulaire envoyé, on récupère tous les champs.
        $nom     = (isset($_POST['nom']))     ? Rec($_POST['nom'])     : '';
         
        $prenom     = (isset($_POST['prenom']))     ? Rec($_POST['prenom'])     : '';
        $email   = (isset($_POST['email']))   ? Rec($_POST['email'])   : '';  
        
        $telephone     = (isset($_POST['telephone']))     ? Rec($_POST['telephone'])     : '';

        $objet     = (isset($_POST['objet']))     ? Rec($_POST['objet'])     : '';

        $message = (isset($_POST['message'])) ? Rec($_POST['message']) : '';
   
        // On va vérifier les variables et l'email ...
        $email = (IsEmail($email)) ? $email : ''; // soit l'email est vide si erroné, soit il vaut l'email entré


        if (($nom != '') && ($prenom != '') &&($email != '') &&($telephone != '') && ($objet != '') && ($message != '')) {
            // les 6 variables sont remplies, on génère puis envoie le mail
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'From:' . $nom . ' <' . $email . '>' . "\r\n" .
                'Reply-To:' . $email . "\r\n" .
                'Content-Type: text/plain; charset="utf-8"; DelSp="Yes"; format=flowed ' . "\r\n" .
                'Content-Disposition: inline' . "\r\n" .
                'Content-Transfer-Encoding: 7bit' . " \r\n" .
                'X-Mailer:PHP/' . phpversion();

        // envoyer une copie au visiteur ?
        if ($copie == 'oui') {
                $cible = $destinataire . ';' . $email;
        } else {
                $cible = $destinataire;
        };

         // Remplacement de certains caractères spéciaux
         $caracteres_speciaux     = array('&#039;', '&#8217;', '&quot;', '<br>', '<br />', '&lt;', '&gt;', '&amp;', '…',   '&rsquo;', '&lsquo;');
         $caracteres_remplacement = array("'",      "'",        '"',      '',    '',       '<',    '>',    '&',     '...', '>>',      '<<');       

         $message = html_entity_decode($message);
         $message = str_replace($caracteres_speciaux, $caracteres_remplacement, $message);

         // Envoi du mail
         $num_emails = 0;
         $tmp = explode(';', $cible);
         foreach ($tmp as $email_destinataire) {
             if (mail($email_destinataire, $objet, $message, $headers))
                 $num_emails++;
         }

         if ((($copie == 'oui') && ($num_emails == 2)) || (($copie == 'non') && ($num_emails == 1))) {
             echo '<h1 class="text-center mt-4">' . $message_envoye . '</h1>';
         } else {
             echo '<h1 class="text-center mt-4">' . $message_non_envoye . '</h1>';
         };
     } else {
         // une des 3 variables (ou plus) est vide ...
         echo '<h1 class="text-center mt-4">' . $message_formulaire_invalide . ' <a href="contact.html"> </a></h1>' . "\n";
     };
 }; // fin du if (!isset($_POST['envoi']))




if($_POST){ // si on valide le formulaire, on entre dans le IF

   if(empty($prenom) || iconv_strlen($prenom) <2 || iconv_strlen($prenom) > 30) {
    $errorNom .= '<span class="col text-danger text-center"> Saisissez un prénom valide 30 caractères max</span>';
   }

   if(empty($nom)  || iconv_strlen($nom) <2 || iconv_strlen($nom) > 30) { 
    $errorPrenom .= '<span class="col text-danger text-center"> Saisissez un nom valide 30 caractères max.</span>';
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
   if(empty($errorPrenom) && empty ($errorNom) && empty($errorEmail))
       {
         $newVisiteur = $bdd->prepare("INSERT INTO contact(nom,prenom,email,telephone,objet,message) VALUES (:nom, :prenom, :email,:telephone, :objet, :message)");
         $newVisiteur->bindvalue(':nom', $prenom, PDO::PARAM_STR);
         $newVisiteur->bindvalue(':prenom', $nom, PDO::PARAM_STR);
         $newVisiteur->bindvalue(':email', $email, PDO::PARAM_STR);
         $newVisiteur->bindvalue(':telephone', $telephone, PDO::PARAM_STR);
         $newVisiteur->bindvalue(':objet', $objet, PDO::PARAM_STR);
         $newVisiteur->bindvalue(':message', $message, PDO::PARAM_STR);
         $newVisiteur->execute();
         $validate .='<div class="alert alert-success">Votre message a bien été envoyé</div>';
       }
   

       if(isset($_POST) && empty($errorNom)){
   
        // instanciation de ma class Contact
        $contact = new Contact;
        $contact->contactAction($nom, $prenom, $email, $telephone, $objet, $message);
        $contact->sendMailAction();
        $successMessage = '<div class="text text-success">Votre message à été envoyé avec succès</div>';
    }
  
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

<div class="row">
  <div class="col-md-6">
    
    <h1 class="display-4 text-center formulaire_title m-5">Formulaire de Contact </h1>
    
  </div>
 <form class="col-md-8 offset-md-3 mt-5" method="post" >
   <div class="form-group">
     <label for="objet">Prénom</label>
     <?= $errorPrenom;?>
            <input type="text" class="form-control" id="objet" name="prenom" >
          </div>
        <div class="form-group">
            <label for="objet">Nom</label>
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