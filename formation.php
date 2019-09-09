<!-- j'appelle les pages init (connexion à la bdd) et le header -->
<?php
require_once("include/init.php");
require_once("include/header.php");
?>

<main class="main_formation">


<div class="container-fluid">

<!-- <div class="lorem"> -->
 <div class="jumbotron jumbotron-fluid header">
            <h1 class="mb-4">Mes formations <i class="fas fa-graduation-cap"></i></h1>
        </div>

        <!-- div entourant le tableau -->
        <div class="text-center table-responsive table-hover container">
    
            <table class="table table-bordered table-striped table-light">
                <thead class="thead-dark">
                    <tr>
                        <th>Titre Formations</th>
                        <th>Sous-titre</th>
                        <th>Dates</th>
                        <th>Descriptions</th>
                    </tr>
                </thead>
                <tbody>
                                        <tr>
                        <td>Intégrateur Développeur Web Junior</td>
                        <td>LepoleS, Vitry Sur Seine (94)</td>
                        <td>19/12/2018 - En cours</td>
                        .row
                        <td class="text-left"><p>Technologies :</p>

<ul >
	<li>HTML</li>
	<li>CSS</li>
	<li>JavaScript</li>
	<li>Jquery</li>
	<li>Bootstrap</li>
	<li>PHP Procédural</li>
	<li>PHP Objet</li>
	<li>MySQL</li>
</ul>

                                        <tr>
                        <td>BTS Système Electronique</td>
                        <td>Lycée Gustave Eiffel, Cachan (94)</td>
                        <td>Septembre 2009 - juin 2011</td>
                        <td class="text-left"><i class="fas fa-check"></i>
</td>
                    </tr>
                                        <tr>
                        <td>Baccalauréat STI </td>
                        <td>Lycée Adolphe Cherioux, Vitry Sur Seine (94)</td>
                        <td>Septembre 2005 - juin 2009</td>

                    </tr>
                                    </tbody>
            </table>
            
        </div> 
</div>


</main>

<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, incidunt! Dolore dolores atque quia totam fugit nemo, cupiditate est expedita, pariatur in impedit voluptates saepe et temporibus explicabo numquam eveniet!</p>
Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, incidunt! Dolore dolores atque quia totam fugit nemo, cupiditate est expedita, pariatur in impedit voluptates saepe et temporibus explicabo numquam eveniet!</p>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, incidunt! Dolore dolores atque quia totam fugit nemo, cupiditate est expedita, pariatur in impedit voluptates saepe et temporibus explicabo numquam eveniet!</p>

<!-- j'appelle la page footer -->
<?php 
require_once "include/footer.php"
?>