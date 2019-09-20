<?php
 // fichier d'initialisation du site

// connexion à la BDD
        $bdd = new PDO('mysql:host=localhost;dbname=siteperso','root', '', array(PDO::ATTR_ERRMODE => PDO:: ERRMODE_WARNING, PDO:: MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8'));


//----------------------------SESSION---------------------
session_start();

//---------------------------CHEMIN-----------------------
define("RACINE_SITE", $_SERVER['DOCUMENT_ROOT'] . '/production_collectif/portfolio_perso/');
define("URL", "");

// define("URL","http://siteperso/");

//--------- VARIABLES
$error =''; // message d'erreur
$validate = ''; // message de validation
$content = ''; // permettra de placer du contenu ou l'on souhaite

//--------- FAILLES XS5
// POST
foreach($_POST as $key => $value)
{
    $_POST[$key] = strip_tags(trim($value));
}

// GET

foreach($_GET as $key => $value)
{
    $_GET[$key] = strip_tags(trim($value));
}
// strip_tags() --> supprime les balises HTML
// trim() --> supprime les espaces en début et fin de chaine

