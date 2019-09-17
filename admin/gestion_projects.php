    <?php
    require_once('../include/init.php');// 1 - CONNEXION BDD

    // II - je m'occupe du traitement PHP
    extract($_POST); // importe les variable de la méthode POST
    extract($_GET);

    // si l'internaute n'est pas connecté et n'est pas ADMIN, il n'a rien à faire ici, on le redirige vers la page index.php
    // if(!internauteEstConnecteEtEstAdmin())
    //  {
    //  header("Location:" . URL . "index.php");
    // }


    //--------SUPPRESSION PROJET------------

    // on entre dans le IF seulement dans le cas ou l'on a cliqué sur le bouton suppression
    if(isset($_GET['action']) && $_GET['action'] == 'suppression' && isset($id))
    { 
        
    // requête de suppression / requete préparée
        $projects_delete = $bdd->prepare("DELETE FROM projects WHERE id_project = :id_project");
        // Je recupere l'id qui se trouve dans l'URL
        $projects_delete->bindValue(':id_project', $id, PDO::PARAM_INT); 
        $projects_delete->execute();

        // $_GET['action'] = 'affichage'; // on redirige vers l'affichage des projets

        $validate .= "<div class='alert alert-success col-md-6 offset-md-3 text-center'>Le produit N° <strong>$id</strong> a bien été supprimer !! </div>";
    } // fin requete suppression


    //-----------------AFFICHAGE DES PROJETS    
    
    $contenu =''; 
    $resultat= $bdd->query('SELECT * FROM projects'); 

    while($projects = $resultat ->fetch(PDO::FETCH_ASSOC)){ // tant que j'ai des données dans ma table, ma boucle affiche le resultat
        $contenu .= '<tr>';
        $contenu .= '<td class="text-dark font-weight-bold">'.$projects['pj_title'].'</td>';
        $contenu .= '<td class="text-dark font-weight-bold">'.$projects['pj_description'].'</td>';
        $contenu .= '<td  scope="col" class="array-article  text-center"><a href="'.$projects['pj_lien'].'">'.$projects['pj_lien'].'</a>"</td>';

        $contenu .= '<td><a href="formulaire_projects.php?action=modif&id='.$projects['id_project'] .'"><i class="fas fa-pen text-light"></i></a></td>';
        $contenu .= '<td  scope="col" class="array-article  text-center"><a class="return"  href="?action=suppression&id=' . $projects['id_project'] . '" onClick="return confirm(\'Etes-vous sûr ?\');"><i
    class="fas fas fa-minus-circle text-danger"></i></a></td>';
    



        $contenu .= '</tr>';
    }

   


require_once('../include/header.php'); 

echo '<pre>'; print_r($_POST); echo'</pre>';
// $_FILES: superglobale qui permet de véhiculer les informations d'un fichier uploader
///echo '<pre>'; print_r($_FILES); echo'</pre>';


// AFFICHAGE PROJETS


    // 1 -  Je récupère les infos pour la modification

    // if ($_POST)
    // { // début $_POST

    //     if(isset($_GET['action']) && $_GET['action'] == 'modifier' && ($_GET['id'])){
    //     $req = $bdd->prepare("SELECT * FROM projets WHERE id_projet = :id_projet");
    //     $req->bindParam(':id_projet', $_GET['id']);
    //     $req->execute();
    //     if($req->rowCount()> 0){
    //         //Je récupère des infos en BDD pour afficher dans le formulaire de modification
    //         $projet_update = $req->fetch(PDO::FETCH_ASSOC);
    //     }
        
    //---insertion en bdd

    // if($_POST){
//     if(empty($titre_projet)||iconv_strlen($titre_projet)<2||iconv_strlen($titre_projet)>100){
//     $msgTitre.='<span class=" alert-warning text-danger"> ** Saisissez un titre valide (100 caractère max)</span>';
//     }
//     if(empty($contenu) ||iconv_strlen($contenu)>400){
//     $msgContenu.='<span class="alert-warning text-danger"> ** La description de doit pas dépasser 400 caractères</span>';
//     }
//     if(empty($liens) ||!filter_var($liens, FILTER_VALIDATE_URL)){
//     $msgliens.='<span class="alert-warning text-danger"> ** Saisissez une url valide</span>';
//     }

//     //------------j'insert en bdd-------

//     $donnees=$bdd->prepare("REPLACE INTO projets VALUES (:id_projet, :titre_projet, :liens, :contenu)", array(
//                 ':id_projet' => $_POST['id_projet'],
//                 ':titre_projet' => $_POST['titre_projet'],
//                 ':contenu' => $_POST['contenu'],
//         ));
//         $donnees->bindValue(':id_projet', $_POST['id_projet'],PDO::PARAM_STR);
//         $donnees->bindValue(':titre_projet', $_POST['titre_projet'],PDO::PARAM_STR);
//         $donnees->bindValue(':contenu', $_POST['contenu'],PDO::PARAM_STR);
//         $donnees->execute() ;
//         $successProjet .= '<div class="alert alert-success">L\'enregistrement a bien été réalisé en BDD.</div>';
//     }


// require_once('../include/header.php'); // le '../' permet de sortir d'un fichier pour y revenir
// echo '<pre>'; print_r($_POST); echo'</pre>';
// $_FILES: superglobale qui permet de véhiculer les informations d'un fichier uploader
///echo '<pre>'; print_r($_FILES); echo'</pre>';

    
// }
 // lorsqu'on ira sur la font selectionnée,l'url detectera l'id proposé

    //   echo '<pre>'; print_r($id_project); echo '</pre>';

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
        <a href="formulaire_projects.php"><i class="fas fa-plus-circle fa-2x offset-11 mb-3"></i></a>
            <table class="table table-bordered text-center text text-light">
                <thead>
                    <tr>
                    <!-- <th scope="col">n° du projet</th> -->
                    <th scope="col">Titre</th>
                    <th scope="col">Description</th>
                    <th scope="col">URL</th>
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