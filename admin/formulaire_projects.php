<?php
require_once('../include/init.php');// 1 - CONNEXION BD

// II - je m'occupe du traitement PHP

extract($_POST); // importe les variable de la méthode POST
extract($_GET);
$pj_titleError ='';
$pj_descriptionError ='';
$pj_PhotoError ='';

$validate ='';
 
// Vérification de mes champs

if($_POST){ // si on valide le formulaire, on entre dans le IF



    if (strlen ($pj_title) < 2 || strlen($pj_title) > 40) {
       $pj_titleError .= '<span class="col text-warning text-center"> Saisissez un titre valide entre 2 et  40 caractères max</span>';
    }
    
    if(empty($pj_description) || iconv_strlen($pj_description) < 2 || iconv_strlen($pj_description) > 200) {
         $pj_descriptionError .= '<span class="col text-warning text-center"> Ce Champs est obligatoire</span>';
    }
     if(empty($pj_photo)){
        $pj_PhotoError  .= '<span class="col text-warning text-center"> photo non Valide</span>';
     }

     if(empty($pj_titleError) && empty($pj_descriptionError) && empty($pj_PhotoError)){


        //requête de protection SQL
        foreach($_POST as $key => $value)
{
    $_POST[$key] = strip_tags(trim($value));
    // strip_tags() --> supprime les balises HTML
// trim() --> supprime les espaces en début et fin de chaine
}




         // insertion d'un projet dans la table 'projects' (requête préparée)
         $insertion=$bdd->prepare("INSERT INTO projects (pj_title, pj_description,pj_photo ) VALUES (:pj_title, :pj_description, :pj_photo)");

         $insertion->bindValue(':pj_title',$pj_title,PDO::PARAM_STR);
         $insertion->bindValue(':pj_description',$pj_description,PDO::PARAM_STR);
         $insertion->bindValue(':pj_photo',$pj_photo,PDO::PARAM_STR);

         $insertion->execute();

     }
} // fin if($_POST)



?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- lien Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- lien perso css-->
    <link rel="stylesheet" href="../css/admin_style.css">
    <!-- Lien fontawesome -->
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
       integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
      <!-- lien de mon icone-->
    <link rel="icon" href="https://img.icons8.com/ios/420/nfc-n-filled.png" type="image/png" />   
    <title>gestionProjet</title>
</head>
<body>

   <h1 class="display-4 text text-center formulaire_projects m-5">Formulaire de mes Projet </h1>
  
 <div class="container"> <!-- début container -->
        <form class="col-md-8 offset-md-2 mt-5 mb-5" method="post" >
           <!-- champs formulaire de mes projet -->
         <div class="form-group">
             <label for="titre">Titre</label>
                <?php echo $pj_titleError ?>
                 <input type="text" class="form-control" id="titre" placeholder="Titre" name="pj_title" >
         </div>
            <div class="form-group">
                <label for="description">Description</label>
                <?php echo $pj_descriptionError ?>
                <textarea class="form-control" name="pj_description" placeholder="description" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="photo">Photo</label>
                <?php echo $pj_PhotoError ?> 
               <input type="file" class="form-control" id="photo" name="pj_photo" >
            </div>

             <button type="submit" name="connexion" class="btn btn-secondary col-md-12" style="background-color:#ffffff31" >Ajout</button>
           
        </form>
 </div> <!-- fin container -->


</body>
</html>