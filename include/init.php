<?php
 // fichier d'initialisation du site

// connexion à la BDD
        $bdd = new PDO('mysql:host=localhost;dbname=symfony-portfolio', 'root', '', array(PDO::ATTR_ERRMODE => PDO:: ERRMODE_WARNING, PDO:: MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8'));

//----------------------------SESSION---------------------
session_start();

//---------------------------CHEMIN-----------------------
define("URL","http://portfolio_perso/");