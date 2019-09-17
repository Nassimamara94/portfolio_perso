<?php
// class de mon formulaire de contact
class Contact 
{
    
    private $nom;
    private $prenom;
    private $email;
    private $telephone;
    private $objet;
    private $message;
    
    // public function setNom($nom){
    //     if(iconv_strlen($nom) > 2 && iconv_strlen($nom) < 41){
    //         $this->pseudo = $pseudo;
    //     }
    //     else{
    //         $this->errors = "entrez un nom compris entre 2 et 40 caractères";
    //         return $this->errors;
    //     }
    // }
    // public function getNom(){
    //     return $this->nom;
    // }
    // public function setEmail($email){
    //     if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
    //         $this->email = $email;
    //     }
    //     else{
    //         $this->errors = "entrez un email valide";
    //         return $this->errors;
    //     }
    // }
    // public function getEmail(){
    //     return $this->email;
    // }
    // public function setMessage($message){
    //     if(iconv_strlen($message) > 2 && iconv_strlen($message) < 256){
    //         $this->message = $message;
    //     }
    //     else{
    //         $this->errors = "entrez un message compris entre 2 et 255 caractères";
    //         return $this->errors;
    //     }
    // }
    // public function getMessage(){
    //     return $this->message;
    // }
    public function contactAction($nom, $prenom, $email, $telephone, $objet, $message)
    {
    $this->nom = strip_tags($nom);
    $this->prenom = strip_tags($prenom);
    $this->email = strip_tags($email);
    $this->telephone = strip_tags($telephone);
    $this->objet = strip_tags($objet);
    $this->message = strip_tags($message);
    $bdd = new PDO('mysql:host=localhost;dbname=siteperso','root', '', array(PDO:: ATTR_ERRMODE => PDO :: ERRMODE_WARNING, PDO :: MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    $insert = $bdd->prepare("INSERT INTO contact (nom, prenom, email, telephone, objet, message) VALUES (:nom, :prenom, :email, :telephone, :objet, :message)");
            
                    $insert->bindValue(":nom", $nom, PDO::PARAM_STR);
                    $insert->bindValue(":prenom", $prenom, PDO::PARAM_STR);
                    $insert->bindValue(":email", $email, PDO::PARAM_STR);
                    $insert->bindValue(":telephone", $telephone, PDO::PARAM_STR);
                    $insert->bindValue(":objet", $objet, PDO::PARAM_STR);
                    $insert->bindValue(":message", $message, PDO::PARAM_STR);
                    $insert->execute();
            
    $insert->closeCursor();
    }
    
    // public function insertAction(){
    //     if(isset($errors))
    //     {
    //         echo $errors;
    //     }
    //     else
    //     {
    //         $bdd = new PDO('mysql:host=localhost;dbname=site_portfolio','root', '', array(PDO:: ATTR_ERRMODE => PDO :: ERRMODE_WARNING, PDO :: MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    //     $insert= $bdd->prepare("INSERT INTO contact (nom, email, message) VALUES (:nom, :email, :message)");
    //     foreach($_POST as $key => $value){
    //             $insert->bindValue(":$key", $value, PDO::PARAM_STR);
    //             $insert->execute();
    //     }
    //     echo '<pre>'; var_dump($_POST);echo '</pre>';
    //     }
        
            
    // }
    public function sendMailAction(){
        if(isset($_POST))/* on verifie si on a bien cliqué sur le bouton 'submit' qui a pour attribut name 'submit', si nous avions plusieurs formulaires sur la meme page, la condition permet de differencier sur quel bouton le formulaire a été validé */
        {
            //1er argument:
            $destinataire = "nassim.amara@lepoles.com";
            //2 eme argument
            $nom = $_POST['nom'];
            $nom = $_POST['prenom'];
            $email = $_POST['email'];
            $nom = $_POST['telephone'];
            $nom = $_POST['objet'];
            $nom = $_POST['message'];
            // 3eme argument: 
            $message = $_POST['message'];
            // 4eme argument: obligatoire (MIME-version 1.0 est un protocole d'envoi de mail stadardisé)
            $entetes = "MIME-Version 1.0 \n"; /* est un standard internet qui étentd le format de données des courriels pour supporter des textes en differents codages des caracteres autres que l'ASCII , des contenus non textuels, des contenus multiples, et des informations d'en-tete en d'autres codages que l'ASCII.*/
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