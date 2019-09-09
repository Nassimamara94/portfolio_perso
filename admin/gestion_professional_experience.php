<?php
require_once('../include/init.php'); // le '../' permet de sortir d'un fichier pour y revenir
extract($_POST);
extract($_GET);

// si l'internaute n'est pas connecté et n'est pas ADMIN, il n'a rien à faire ici, on le redirige vers la page connexion.php
// if(!internauteEstConnecteEtEstAdmin())
// {
//     header("Location:" . URL . "connexion.php");
// }
