<!-- j'appelle les pages init (connexion à la bdd) et le header -->
<?php
require_once("include/init.php");
require_once("include/header.php");
?>
<!-- main -->
 <main class="main_about">
   <div class="row">
     <div class="col-md-5 mt-5"> 
	<h1 class="propos">A propos</h1>
     </div>
     <div class="col-md-5 mt-5">
        <h2>En quelques mots</h2>          

            <p class="desc"><img src="https://img.icons8.com/officexs/16/000000/quote.png" alt="icone" style="padding:10px;">
            > Nassim
            , 29 ans, Développeur intégrateur web Junior en formation, passionné par l'informatique et par le web en particulier. <img src="https://img.icons8.com/officexs/16/000000/quote.png" style="padding:10px;" alt="icone"></p>       
      </div> <!-- fin col-md-6 -->
	</div> <!-- fin raw -->
<p>
  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium vel sit minima fugiat reprehenderit facere quia vero doloribus, provident in laborum quaerat nihil iste, animi, quam temporibus? Aut, assumenda excepturi.
</p>


      </main>

<!-- j'appelle la page footer -->
<?php 
require_once "include/footer.php"
?>