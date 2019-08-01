<!-- j'appelle les pages init (connexion à la bdd) et le header -->
<?php
require_once("include/init.php");
require_once("include/header.php");
?>

<main class="main_contact">


<div class="container">

    <!-- <form id="contact" method="post">
    	<fieldset><legend>Vos coordonnées</legend>
    		<p><label for="nom">Nom :</label><input type="text" id="nom" name="nom" /></p>
    		<p><label for="email">Email :</label><input type="text" id="email" name="email" /></p>
    	</fieldset>
     
    	<fieldset><legend>Votre message :</legend>
    		<p><label for="objet">Objet :</label><input type="text" id="objet" name="objet" /></p>
    		<p><label for="message">Message :</label><textarea id="message" name="message" cols="30" rows="8"></textarea></p>
    	</fieldset>
     
    	<div style="text-align:center;"><input type="submit" name="envoi" value="Envoyer le formulaire !" /></div>
    </form> -->



    
        <!-- Champ email -->
        <div class="container">
         <h1 class="display-4 text-center"> Formulaire de Contact </h1> <br>
       
        <form class="col-md-4 offset-md-4" method="post" action="">
        <div class="form-group">
           <label for="objet">Objet</label>
          <input type="objet" class="form-control" id="objet" name="objet" placeholder="Enter objet">
    </div>
     <div class="form-group">
           <label for="email">Email</label>
          <input type="text" class="form-control" id="email" name="email" placeholder="Enter email">
    </div>
     <div class="form-group">
           <label for="message">Message</label>
          <input type="text" class="form-control" id="message" name="message" row="3" placeholder="Enter message">
    </div>


    <button type="submit" name="submit" class="col -md-12 btn btn-primary mb-4">Submit</button>
     </div>
</div>


</main>

<!-- j'appelle la page footer -->
<?php 
require_once "include/footer.php"
?>