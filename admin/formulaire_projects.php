<?php
require_once('../include/init.php');// 1 - CONNEXION BDD
require_once('../include/header2.php'); 

// II - je m'occupe du traitement PHP

extract($_POST); // importe les variable de la méthode POST
extract($_GET);
$pj_titleError ='';
$pj_descriptionError ='';
$pj_LienError ='';

$validate ='';
// 1 -  Je récupère les infos pour la modification
if(isset($_GET['action']) && $_GET['action'] == 'modif' && isset($_GET['id'])){
    $req=$bdd->prepare("SELECT * FROM projects WHERE id_project = :id_project");
    $req->bindParam(':id_project', $_GET['id']);
    $req->execute();
    if($req->rowCount() > 0){
        //Je récupère des infos en BDD pour afficher dans le formulaire de modification
        $project_update = $req->fetch(PDO::FETCH_ASSOC);
    }//if($req->rowCount() > 0
}//FIN if(isset($_GET['action']) && $_GET['action'] == 'update'

// Vérification de mes champs

if($_POST){ // si on valide le formulaire, on entre dans le IF

    if (strlen ($pj_title) < 2 || strlen($pj_title) > 40) {
       $pj_titleError .= '<span class="col text-warning text-center"> Saisissez un titre valide entre 2 et  40 caractères max</span>';
    }  
    if(empty($pj_description) || iconv_strlen($pj_description) < 2 || iconv_strlen($pj_description) > 200) {
         $pj_descriptionError .= '<span class="col text-warning text-center"> Ce Champs est obligatoire</span>';
    }
     if(empty($pj_lien) || !filter_var($pj_lien, FILTER_VALIDATE_URL)){
        $pj_LienError  .= '<span class="col text-warning text-center"> Lien non Valide</span>';
     }
     if(empty($pj_titleError) && empty($pj_descriptionError) && empty($pj_LienError)){

        //requête de protection SQL
        foreach($_POST as $key => $value){
            // strip_tags() --> supprime les balises HTML
            // trim() --> supprime les espaces en début et fin de chaine
            $_POST[$key] = strip_tags(trim($value));
            // assainissement des saisies de l'intertnaute
            $_POST[$key] = htmlspecialchars($value, ENT_QUOTES);
    }
         // insertion d'un projet dans la table 'projects' (requête préparée)
         $donnees = $bdd->prepare("REPLACE INTO projects VALUES (:id_project, :pj_title, :pj_description, :pj_lien)", array(
             ':id_project' => $_POST['id_project'],
             ':pj_title' => $_POST['pj_title'],
             ':pj_description' => $_POST['pj_description'],
             ':pj_lien' => $_POST['pj_lien'],
         ));   

         $donnees->bindValue(':id_project',$id_project,PDO::PARAM_STR);
         $donnees->bindValue(':pj_title',$pj_title,PDO::PARAM_STR);
         $donnees->bindValue(':pj_description',$pj_description,PDO::PARAM_STR);
         $donnees->bindValue(':pj_lien',$pj_lien,PDO::PARAM_STR);

         $donnees->execute();

        header('location:gestion_projects.php');
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
             <input type="hidden" name="id_project">
             <label for="titre">Titre</label>
                <?php echo $pj_titleError ?>
                 <input type="text" class="form-control" id="titre" placeholder="Titre" name="pj_title" value="<?php echo $project_update['pj_title'] ??
                    $_POST['pj_title'] ?? '' ?>">
         </div>
            <div class="form-group">
                <label for="description">Description</label>
                <?php echo $pj_descriptionError ?>
                <textarea class="form-control" name="pj_description" placeholder="description" rows="3" > <?php echo $project_update['pj_description'] ??
                    $_POST['pj_description'] ?? '' ?></textarea>
            </div>
            <div class="form-group">
                <label for="lien">lien</label>
                 <?php echo $pj_LienError ?> 
               <input type="text" class="form-control" id="lien" name="pj_lien" value="<?php echo $project_update['pj_lien'] ??
                    $_POST['pj_lien'] ?? '' ?>" >
            </div>

             <button type="submit" name="connexion" class="btn btn-secondary col-md-12" style="background-color:#ffffff31" >Ajout</button>
           
        </form>
 </div> <!-- fin container -->
</body>
</html>