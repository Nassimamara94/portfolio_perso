    <?php
    require_once('../include/init.php');// 1 - CONNEXION BDD
    // II - je m'occupe du traitement PHP
    extract($_POST); // importe les variable de la méthode POST
    extract($_GET);
    // si l'internaute n'est pas connecté et n'est pas ADMIN, il n'a rien à faire ici, on le redirige vers la page index.php
    if(!internauteEstConnecteEtEstAdmin())
     {
     header("Location:" . URL . "index.php");
    }

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
require_once('../include/header2.php'); 

echo '<pre>'; print_r($_POST); echo'</pre>';
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
           <?= $validate; ?>
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