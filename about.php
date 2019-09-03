<!-- j'appelle les pages init (connexion à la bdd) et le header -->
<?php
require_once("include/init.php");
require_once("include/header.php");
?>
<!-- main -->
<!-- <main class="main_about">
<header>

</header> -->
<!--Fin Main-->
<!-- <h1>A propos</h1>
<p>
  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium vel sit minima fugiat reprehenderit facere quia vero doloribus, provident in laborum quaerat nihil iste, animi, quam temporibus? Aut, assumenda excepturi.
</p>
<p>
  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium vel sit minima fugiat reprehenderit facere quia vero doloribus, provident in laborum quaerat nihil iste, animi, quam temporibus? Aut, assumenda excepturi.
</p>
<p>
  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium vel sit minima fugiat reprehenderit facere quia vero doloribus, provident in laborum quaerat nihil iste, animi, quam temporibus? Aut, assumenda excepturi.
</p>
<p>
  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium vel sit minima fugiat reprehenderit facere quia vero doloribus, provident in laborum quaerat nihil iste, animi, quam temporibus? Aut, assumenda excepturi.
</p>
<p>
  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium vel sit minima fugiat reprehenderit facere quia vero doloribus, provident in laborum quaerat nihil iste, animi, quam temporibus? Aut, assumenda excepturi.
</p>
<p>
  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium vel sit minima fugiat reprehenderit facere quia vero doloribus, provident in laborum quaerat nihil iste, animi, quam temporibus? Aut, assumenda excepturi.
</p>
<p>
  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium vel sit minima fugiat reprehenderit facere quia vero doloribus, provident in laborum quaerat nihil iste, animi, quam temporibus? Aut, assumenda excepturi.
</p>
<p>
  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium vel sit minima fugiat reprehenderit facere quia vero doloribus, provident in laborum quaerat nihil iste, animi, quam temporibus? Aut, assumenda excepturi.
</p>
<p>
  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium vel sit minima fugiat reprehenderit facere quia vero doloribus, provident in laborum quaerat nihil iste, animi, quam temporibus? Aut, assumenda excepturi.
</p>
<p>
  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium vel sit minima fugiat reprehenderit facere quia vero doloribus, provident in laborum quaerat nihil iste, animi, quam temporibus? Aut, assumenda excepturi.
</p>
<p>
  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium vel sit minima fugiat reprehenderit facere quia vero doloribus, provident in laborum quaerat nihil iste, animi, quam temporibus? Aut, assumenda excepturi.
</p>
<p>
  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium vel sit minima fugiat reprehenderit facere quia vero doloribus, provident in laborum quaerat nihil iste, animi, quam temporibus? Aut, assumenda excepturi.
</p>
<p>
  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium vel sit minima fugiat reprehenderit facere quia vero doloribus, provident in laborum quaerat nihil iste, animi, quam temporibus? Aut, assumenda excepturi.
</p>
<p>
  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium vel sit minima fugiat reprehenderit facere quia vero doloribus, provident in laborum quaerat nihil iste, animi, quam temporibus? Aut, assumenda excepturi.
</p>
<p>
  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium vel sit minima fugiat reprehenderit facere quia vero doloribus, provident in laborum quaerat nihil iste, animi, quam temporibus? Aut, assumenda excepturi.
</p>
<p>
  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium vel sit minima fugiat reprehenderit facere quia vero doloribus, provident in laborum quaerat nihil iste, animi, quam temporibus? Aut, assumenda excepturi.
</p>
<p>
  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium vel sit minima fugiat reprehenderit facere quia vero doloribus, provident in laborum quaerat nihil iste, animi, quam temporibus? Aut, assumenda excepturi.
</p>
<p>
  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium vel sit minima fugiat reprehenderit facere quia vero doloribus, provident in laborum quaerat nihil iste, animi, quam temporibus? Aut, assumenda excepturi.
</p>
<p>
  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium vel sit minima fugiat reprehenderit facere quia vero doloribus, provident in laborum quaerat nihil iste, animi, quam temporibus? Aut, assumenda excepturi.
</p>
<p>
  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium vel sit minima fugiat reprehenderit facere quia vero doloribus, provident in laborum quaerat nihil iste, animi, quam temporibus? Aut, assumenda excepturi.
</p>
<p>
  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium vel sit minima fugiat reprehenderit facere quia vero doloribus, provident in laborum quaerat nihil iste, animi, quam temporibus? Aut, assumenda excepturi.
</p>
<p>
  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium vel sit minima fugiat reprehenderit facere quia vero doloribus, provident in laborum quaerat nihil iste, animi, quam temporibus? Aut, assumenda excepturi.
</p>
<p>
  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium vel sit minima fugiat reprehenderit facere quia vero doloribus, provident in laborum quaerat nihil iste, animi, quam temporibus? Aut, assumenda excepturi.
</p> -->
<div class="l__content-wrapper">

            <!-- Left content -->
            <div class="l__content-container-left">
                <h1 class="content-title border-double a__text-focus-in">A propos</h1>
            </div>
            <!-- Right content -->
            <main class="l__content-container-right">
                <p class="about-p">Hello, je m'appelle Stéphane Robert, j'ai 30 ans et je suis développeur front-end junior depuis peu.
                    J'ai découvert le monde du web en 2016, et après 9 ans dans la même entreprise, j'ai décidé de
                    changer de voie et de me reconvertir professionnellement. Oui un pari risqué mais qui vaut le coup.<br><br>
                    J'ai eu l'opportunité d'apprendre le code via des formations au sein du <a href="https://www.lewagon.com/fr"
                        target="_blank" class="about-content__link lewagon">Wagon</a>, un bootcamp de code de 9 semaines intensives et sur la plateforme <a href="https://openclassrooms.com/fr/"
                        target="_blank" class="about-content__link ocr">OpenClassrooms</a>. J'ai pu ainsi 
                        découvrir tous les aspects du développement web, ce qui m'a permis de choisir une spécialité...le
                        front-end.<br>
                    Le front-end, la vitrine du développement, me plaît car je prends un réel plaisir à créer /
                    reproduire / intégrer des interfaces.
                    Je vois en cette partie visible et design, une forme d'art. Je ne suis
                    pas maladivement perfectionniste, mais j'ai le soucis du détail, pour moi un pixel est un pixel. D'ailleurs des sites comme
                    <a href="https://www.awwwards.com/" target="_blank" class="about-content__link awwwards">Awwwards</a> ou <a
                        href="https://www.cssdesignawards.com/" target="_blank" class="about-content__link cssda">Css Design
                        Awards</a> récompensent
                    les plus beaux sites, donc autant vous dire que j'aimerais être récompensé dans ma nouvelle
                    carrière de développeur.<br><br>
                    Sinon à part ça, dans la vie j'aime pas mal de choses, comme le foot, les jeux vidéos, les voyages,
                    la culture japonaise, la musique plutôt blues, jazz, soul, jazz-hop.
                    Voilà assez parlé de moi ! Je vous souhaite une bonne visite sur mon portfolio et n'hésitez pas à me
                    laisser un mot, un coucou, un retour sur le portfolio, une offre d'emploi ou toute demande particulière dans la partie <a href="contact.html" class="about-content__link about-contact">contact</a>.
                </p>
            </main>
        </div>
<!-- </main> -->

<!-- j'appelle la page footer -->
<?php 
require_once "include/footer.php"
?>