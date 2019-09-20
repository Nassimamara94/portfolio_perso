<?php
// class de mon formulaire de contact
class Contact
{
   private $nom;
   private $email;
   private $message;
   public function contactAction($nom, $email, $message)
   {
   $this->nom = strip_tags($nom);
   $this->email = strip_tags($email);
   $this->message = strip_tags($message);
   $bdd = new PDO('mysql:host=localhost;dbname=site_portfolio','root', '', array(PDO:: ATTR_ERRMODE => PDO :: ERRMODE_WARNING, PDO :: MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
   $insert = $bdd->prepare("INSERT INTO contact (nom, email, message) VALUES (:nom, :email, :message)");
                   $insert->bindValue(":nom", $nom, PDO::PARAM_STR);
                   $insert->bindValue(":email", $email, PDO::PARAM_STR);
                   $insert->bindValue(":message", $message, PDO::PARAM_STR);
                   $insert->execute();
   $insert->closeCursor();
   }
   public function sendMailAction(){
       if(isset($_POST))/* on verifie si on a bien cliqué sur le bouton 'submit' qui a pour attribut name 'submit', si nous avions plusieurs formulaires sur la meme page, la condition permet de differencier sur quel bouton le formulaire a été validé */
       {
           //1er argument:
           $destinataire = "sylvain.baillet@lepoles.com";
           //2 eme argument
           $nom = $_POST['nom'];
           $email = $_POST['email'];
           // 3eme argument:
           $message = $_POST['message'];
           // 4eme argument: obligatoire (MIME-version 1.0 est un protocole d'envoi de mail stadardisé)
           $entetes = "MIME-Version 1.0 \n"; / est un standard internet qui étentd le format de données des courriels pour supporter des textes en differents codages des caracteres autres que l'ASCII , des contenus non textuels, des contenus multiples, et des informations d'en-tete en d'autres codages que l'ASCII./
           // entete expediteur: toujours "from" et non "de" par exemple
           $entetes .= "from: moi@exemple.com\n";
           //priorité urgente
           $entetes .= "X-priority: 1\n";
           //type de contenu HTML // avec cette ligne, je peux coder en html dans le message
           $entetes .= "content-type: text/html; charset=utf-8\n";
           mail($destinataire, $nom, $email, $message, $entetes); // fonction predefinie permettant l'envoi du mail / toujours  4 arguments: destinataire/sujet/message/expediteur. L'ordre est crucial sinon le test ne fonctionne pas.
       }
   }
}