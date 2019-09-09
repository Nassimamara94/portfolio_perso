
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>portFolio - Nassim Amara</title>
    <!-- lien Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- lien perso css-->
    <link rel="stylesheet" href="css/style.css">
    <!-- lien de mon icone-->
    <link rel="icon" href="https://img.icons8.com/ios/420/nfc-n-filled.png" type="image/png"/>
</head>
<body>
    <div class="container-fluid">

        <!-- j'ai créer deux div principaux (row) -->
        <div class="row">
            <!-- à l'intérieur de ma row,on met un col-md-6 afin d'avoir la page d'accueil en 2 parties principaux-->
            <div class="col-md-6" id="block1">

                <img src="image/Space_Debris-ESA.jpg" alt="routes" style="height:100%;width:100%;">
            <h1 class="glow">Nassim Amara<br>
               <a href="../portfolio_perso/admin/connexion.php" target="_blank" id="connect">Développeur web Junior<br></a>
               Bienvenue sur mon portfolio 
            </h1>
             <hr class="bg-dark" hidden>
       
            </div>
            <div class="col-md-6" id="block2">
                <div class="row">
                    <div class="col-md-12" id="sBlocka">
                        <a href="about.php" target="_blank"> <h1 class="about">A Propos</h1></a>
                    </div>
                </div>
                <!-- je sépare une div en 4 partie -->
                <div class="row">
                    <div class="col-md-6" id="sBlockb">
                       <a href="formation.php" target="_blank"> <h1 class="about">Formation</h1></a>
                    </div>
                    <div class="col-md-6" id="sBlockc">
                         <a href="competence.php" target="_blank"> <h1 class="about">Compétence</h1></a>
                    </div>
                    <div class="col-md-6" id="sBlockd">
                         <a href="projects.php" target="_blank"> <h1 class="about">Projects</h1></a>
                    </div>
                    <div class="col-md-6" id="sBlocke">
                         <a href="contact.php" target="_blank"> <h1 class="contact_title">Contact</h1></a>
                    </div>
                </div>
            </div>
            <!-- fin de la div row -->
        </div>
   
    </div>

</body>
</html>