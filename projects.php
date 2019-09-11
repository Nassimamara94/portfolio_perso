<!-- j'appelle les pages init (connexion à la bdd) et le header -->
<?php
require_once("include/init.php");
require_once("include/header.php");


?>

<main class="main_projects">

  <?php

  extract($_GET);
  extract($_POST);

//variables affichage
$contenu="";
$validation="";
$project='';

//--je me connecte à ma table experience
$donnees=$bdd->query("SELECT * FROM projects ORDER BY id_project DESC");
 //---je recupére les infos de ma table experience en faisant une boucle
 while($project=$donnees->fetch(PDO::FETCH_ASSOC)){
        $contenu.='<div class=" col-md-4 card m-3" style="width: 18rem;">';
        $contenu.='<div class="card-body">';
        $contenu.='<h5 class="card-title">'.$project['pj_title'].'</h5>';
        $contenu.='<p class="card-text">'.$project['pj_description'].'</p>';
        $contenu.='</div>';
        $contenu.='<ul class="list-group list-group-flush">';
        $contenu.='<li class="list-group-item"> entreprise :'.$project['pj_photo'].'</li>';    
        $contenu.='</ul>';
        $contenu.='<div class="card-body">';
        // $contenu.='<a href="form_experience.php?action=modifier&id='.$xp['id_xp'].'" class="card-link"><i class="fas fa-pen-square text-warning fa-2x"></i></a>';
        // $contenu.='<a href="?action=supp&id='.$xp['id_xp'].'" class="card-link"><i class="fas fa-trash-alt text-danger fa-2x"></i></a>';
        $contenu.='</div>';
        $contenu.='</div>';

  
  // $resultat = $bdd->prepare("SELECT * FROM projects WHERE id_project= :id_project");
  // $resultat->bindValue(':id_project', $_GET['id_project'], PDO::PARAM_INT);
  // $resultat->execute();
  // $projects = $resultat->fetch(PDO::FETCH_ASSOC);
  // echo '<pre>'; print_r($projects); echo'</pre>';

  ?>


<div class="container-fluid">

<div class="lorem">
<br><br><br>

<div class="row">
    <?php echo $contenu;?>
</div>
<!-- <div class="card mt-20px;" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div> -->
</div>
</div>


</main>



<!-- j'appelle la page footer -->
<?php 
require_once "include/footer.php"
?>