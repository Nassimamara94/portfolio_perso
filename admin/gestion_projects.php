<?php
require_once "../include/init.php";// 1 - CONNEXION BDD

// II - je m'occupe du traitement PHP

extract($_POST); // importe les variable de la méthode POST
extract($_GET);

$validate = ''; // déclaration d'une variable 



//--------SUPPRESSION PROJET------------
// on entre dans le IF seulement dans le cas ou l'on a cliqué sur le bouton suppression
// if(isset($_GET['action']) && $_GET['action'] =='suppression')
// {

// requête de suppression / requete préparée

    // $data_delete = $bdd->prepare("DELETE FROM projects WHERE id_project = :id_project");

    //  on associe une valeur à un paramètre 
    // $data_delete->bindValue(':id_produit', $id_produit, PDO::PARAM_INT); // $id_produit fait référence à $_GET['id_produit'] (extract)
    // $data_delete->execute();


    // $validate .= "<div class='alert alert-success col-md-6 offset-md-3 text-center'>Le projet N° <strong>$id_produit</strong> a bien été supprimer !! </div>";

// fin requete suppression

// }

if($_POST)
{
    $photo_bdd = '';
    if(isset($_GET['action']) && $_GET['action'] == 'modification')
    {
        $photo_bdd = $photo_actuelle; // si on souhaite conserver la même photo en cas de modification, on affecte la valeur du champ photo 'hidden', c'est à dire l'URL de la photo selectionnée en BDD
    }

    if(!empty($_FILES['pj_photo']['name'])) // on vérifie que l'indice 'name' dans la superglobale $_FILES n'est pas vide, cela veut dire que l'on a bien uploder une photo
    {
        $nom_photo = $reference . '-' . $_FILES['pj_photo']['name']; // on redéfinit le nom de la photo en concaténant le réference saisi dans le formulaire avec le nom de la photo
        //echo $nom_photo . '<br>';

        $photo_bdd = URL . "image/$nom_photo"; // on définit l'URL de la photo,c'est ce que l'on conservera en BDD
        //echo $photo_bdd . '<br>';

        $photo_dossier = RACINE_SITE . "image/$nom_photo"; // on définit le chemin physique de la photo sur le disque dur du serveur, c'est ce qui nous permettra de copier la photo dans le dossier photo
        //echo $photo_dossier . '<br>';

        copy($_FILES['pj_photo']['tmp_name'], $photo_dossier); // copy() est une fonction prédéfinie qui permet de copierla photo dans le dossier photo . arguments : copy(nom_temporaire_photo, chemin de destination)
    }

// Ajout Projet

if(isset($_GET['action']) && $_GET['action'] == 'ajout')
    {
        $data_insert = $bdd->prepare("INSERT INTO projects
        (pj_title,pj_description,pj_photo) VALUES (:pj_title,:pj_description,:pj_photo)");

        $_GET['action'] = 'affichage';

        $validate .= "<div class='alert alert-success col-md-6 offset-md-3 text-center'>Le projet <strong>$pj_title</strong> a bien été ajouté !!</div>"; 
    }
    else
    {
        // Exo : requete update
    
        $data_insert = $bdd->prepare("UPDATE projects SET pj_title = :pj_title, pj_description = :pj_description, pj_photo WHERE id_project = $id_project");
        
        $_GET['action'] = 'affichage';

        $validate .= "<div class='alert alert-success col-md-6 offset-md-3 text-center'>Le projet  n° <strong>$id_project</strong> a bien été modifié !!</div>"; 
    }
    
    foreach($_POST as $key => $value)
    {
        if($key != 'pj_photo') // on ejecte le champs 'hidden' de la photo
        {
            $data_insert->bindValue(":$key", $value, PDO::PARAM_STR); 
        } 
    }
    $data_insert->bindValue(":pj_photo", $photo_bdd, PDO::PARAM_STR); 
    $data_insert->execute();

}

//-----------------AFFICHAGE DES PROJETS    
$contenu =''; 
$resultat= $bdd->query('SELECT * FROM projects'); 

while($projects = $resultat ->fetch(PDO::FETCH_ASSOC)){ // tant que j'ai des données dans ma table, ma boucle affiche le resultat
    $contenu .= '<a href="formulaire_projects.php"><i class="fas fa-plus-circle"></i></a>';
    $contenu .= '<tr>';
    $contenu .= '<td>'.$projects['pj_title'].'</td>';
    $contenu .= '<td>'.$projects['pj_description'].'</td>';
    $contenu .= '<td>'.$projects['pj_photo'].'</td>';
    $contenu .= '<td><a href="?action=modif&id='.$projects['id_project'] .'"><i class="fas fa-pen"></i></a></td>';
    $contenu .= '<td><a href="?action=supp&id='.$projects['id_project'] .'"><i class="fas fa-minus-circle"></i></a></td>';
    $contenu .= '</tr>';
} // lorsqu'on ira sur la font selectionnée,l'url detectera l'id proposé

?> <!-- fermeture de la balise php afin de mettre du html -->
<!-- affichage de ma table project sous forme de tableau HTml-->
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

 <h1 class="display-4 text-center">Gestion des projets</h1><hr>
    <div class="container">
        <table class="table table-bordered text-center">
             <thead>
             
                 <tr>
                  <!-- <th scope="col">n° du projet</th> -->
                  <th scope="col">Titre</th>
                  <th scope="col">Description</th>
                  <th scope="col">photo</th>
                  <th colspan="2">action</th>

                 </tr>
                 
             </thead>
 <tbody>
     <?php
        echo $contenu;
     ?>

  </tbody>
        </table>
    </div> <!-- fin container -->


</body>
</html>