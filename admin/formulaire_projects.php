<?php
require_once('../include/init.php');// 1 - CONNEXION BD

// II - je m'occupe du traitement PHP

extract($_POST); // importe les variable de la méthode POST
extract($_GET);
$pj_titleError ='';
$pj_descriptionError ='';
$pj_lienError ='';
$successProject ="";
$photo_actuelle='';

$validate ='';

// 1 -  Je récupère les infos pour la modification
if(isset($_GET['action']) && $_GET['action'] == 'modif' && isset($_GET['id'])){
    $req = $bdd->prepare("SELECT * FROM projects WHERE id_project = :id_project");
    $req->bindParam(':id_project', $_GET['id']);
    $req->execute();

    if($req->rowCount() > 0){
        //Je récupère des infos en BDD pour afficher dans le formulaire de modification
        $project_replace = $req->fetch(PDO::FETCH_ASSOC);
    }
}//FIN if(isset($_GET['action']) && $_GET['action'] == 'update'
 
// Vérification de mes champs

if($_POST){ // si on valide le formulaire, on entre dans le IF


    
    if( empty($pj_title) ||strlen($pj_title) < 2 || strlen($pj_title) > 40) {
       $pj_titleError .= '<span class="col text-warning text-center"> Saisissez un titre valide entre 2 et  40 caractères max</span>';
    }
    
    if(empty($pj_description) || iconv_strlen($pj_description) < 2 || iconv_strlen($pj_description) > 200) {
         $pj_descriptionError .= '<span class="col text-warning text-center"> Ce Champs est obligatoire</span>';
    }
     if(empty($pj_lien) || !filter_var($pj_lien, FILTER_VALIDATE_URL)){
        $pj_lienError  .= '<span class="col text-warning text-center">URL non valide</span>';
     }

        if(empty($pj_titleError) && empty($pj_descriptionError) && empty($pj_lienError) ){ 

        foreach($_POST as $key => $value){
            $_POST[$key] = strip_tags(trim($value));
            // strip_tags() --> supprime les balises HTML
            // trim() --> supprime les espaces en début et fin de chaine
        }

 // requête de modification et d'enregistrement en BDD

        $donnees=$bdd->prepare("REPLACE INTO projects VALUES (:id_project, :pj_title, :pj_description, :pj_lien)", array(
            ':id_project' => $_POST['id_project'],
            ':pj_title' => $_POST['pj_title'],
            ':pj_description' => $_POST['pj_description'],
            ':pj_lien' => $_POST['pj_lien'],
        ));

        $donnees->bindValue(':id_project', $_POST['id_project'],PDO::PARAM_INT);
        $donnees->bindValue(':pj_title', $_POST['pj_title'],PDO::PARAM_STR);
        $donnees->bindValue(':pj_description',$_POST['pj_description'],PDO::PARAM_STR);
        $donnees->bindValue(':pj_lien', $_POST['pj_lien'],PDO::PARAM_STR);
        $donnees->execute();
    $successProject .= '<div class="alert alert-success">L\'enregistrement a bien été réalisé en BDD.</div>';

    
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
    <?php if(isset($_GET['action']) && $_GET['action']=='modif' && isset($_GET['id'])){  ?>
   <h1 class="display-4 text-success text-center formulaire_projects m-5">Modifier un project </h1>
   <?php } else { ?>
   <h1 class="display-4 text-info  text-center formulaire_projects m-5">Ajouter un projet </h1>
  <?php } ?>
 <div class="container"> <!-- début container -->

 <a href="gestion_projects.php" class="btn btn-primary">retour gestion projet</a>
        <form class="col-md-8 offset-md-2 mt-5 mb-5" method="post" >
            <input type="hidden" name="id_project"  value="<?php echo $project_replace['id_project'] ?? $_POST['id_project'] ?? '' ?>">
           <!-- champs formulaire de mes projet -->
         <div class="form-group">
             <label for="titre">Titre</label>
                <?php echo $pj_titleError ?>
                 <input type="text" class="form-control" id="titre" placeholder="Titre" name="pj_title" value="<?php echo $project_replace['pj_title'] ?? $_POST['pj_title'] ?? '' ?>">
         </div>
            <div class="form-group">
                <label for="description">Description</label>
                <?php echo $pj_descriptionError ?>
                <textarea class="form-control" name="pj_description" placeholder="description" rows="3"><?php echo $project_replace['pj_description'] ?? $_POST['pj_description'] ?? '' ?></textarea>
            </div>
            <div class="form-group">
                <label for="pj_lien">URL</label>
                <?php echo $pj_lienError ?> 
               <input type="text" class="form-control"  name="pj_lien"  value="<?php echo $project_replace['pj_lien'] ?? $_POST['pj_lien'] ?? '' ?>">
            </div>

             <button type="submit" name="connexion" class="btn btn-secondary col-md-12 bg-primary">Ajout</button>
           
        </form>
 </div> <!-- fin container -->


</body>
</html>