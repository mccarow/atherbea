<?php
include("inc/conf.php");
?>
<!doctype html>
<html lang="fr">
    <head>
        <?php include("inc/head.php"); ?>

        <title>Atherbea</title>
    </head>
    <body id="form">
        <!--
          DEBUT HEADER
        -->
        <?php
        include("inc/header.php");
        ?>
        <!--
          FIN HEADER
        -->

        <!--
          DEBUT BANDEAU HOME
        -->
        <div id="div_contenaire" class="row m-0 text-white text-center">
            <div id="pole_association" class="pole col-lg-3 col-md-6">
                <span>L'ASSOCIATION 3</span></br>
                <div>test</div>
                <h2>ATHERBEA</h2>
                <ul class="lien_rapide">
                    <li><a href="#"> Présentation</a></li>
                    <li><a href="#">Publics concernés</a></li>
                    <li><a href="#">Les missions</a></li>
                    <li><a href="#">L'équipe</a></li>
                </ul>
            </div>
            <div id="pole_prevention" class="pole col-lg-3 col-md-6">
                <span>PÔLE PREVENTION</span></br>
                <h2>ET ACCUEIL D'URGENCE</h2>
                <ul class="lien_rapide">
                    <li><a href="#"> Présentation</a></li>
                    <li><a href="#">Publics concernés</a></li>
                    <li><a href="#">Les missions</a></li>
                    <li><a href="#">L'équipe</a></li>
                </ul>
            </div>
            <div id="pole_social" class="pole col-lg-3 col-md-6"> 
                <span>PÔLE SOCIALISATION</span></br>
                <h2>ET SOINS SANTE</h2>
                <ul class="lien_rapide">
                    <li><a href="#"> Présentation</a></li>
                    <li><a href="#">Publics concernés</a></li>
                    <li><a href="#">Les missions</a></li>
                    <li><a href="#">L'équipe</a></li>
                </ul>
            </div>
            <div id="pole_ateliers" class="pole col-lg-3 col-md-6">  
                <span>PÔLE INSERTION</span></br>
                <h2>ATELIERS CHANTIERS</h2>
                <ul class="lien_rapide">
                    <li><a href="#"> Présentation</a></li>
                    <li><a href="#">Publics concernés</a></li>
                    <li><a href="#">Les missions</a></li>
                    <li><a href="#">L'équipe</a></li>
                </ul>
            </div>
        </div>
        <!--
          FIN BANDEAU HOME
        -->

        <!--
          DEBUT CONTENU
        -->
        <section>
            <div class="container" id="contenu">
                <div class="row">
                    <div class="titre">
                        <span>association atherbea</span>
                        <h2>accueil des personnes et familles en difficult&eacute;</h2>
                    </div>
                    <div>
                        <img src="images/Images.jpg" class="img-fluid" alt="images1">      
                        <p><a href="#">L&rsquo;association Atherbea</a> accueille des personnes en difficult&eacute;, sans logement, sans ressource et sans travail, seules ou avec leurs enfants, dans le but de favoriser leur r&eacute;insertion sociale.</p>
                        <p>Vous trouverez sur ce site des informations concernant notre association, son actualit&eacute;, son S.I.A.O. et ses trois CHRS :</p>
                        <ul id="liens">
                            <li><i class="fas fa-long-arrow-alt-right"></i>&nbsp;<a href="#">le Foyer Atherbea</a></li>
                            <li><i class="fas fa-long-arrow-alt-right"></i>&nbsp;<a href="#">Le CADA</a>&nbsp;(Centre d'Accueil des Demandeurs d'Asile)</li>
                            <li><i class="fas fa-long-arrow-alt-right"></i>&nbsp;<a href="#">le Foyer Les Mouettes</a></li>
                        </ul>
                        <p>Si vous avez besoin d&rsquo;aide, acc&eacute;dez à <a href="#">notre S.I.A.O. en ligne</a> pour &ecirc;tre orient&eacute; vers une structure qui pourra vous aider.
                        </p>    
                    </div>
                </div>
            </div>
        </section>
        <!--
          FIN CONTENU
        -->

        <!--
          DEBUT NOUS AIDER
        -->
        <?php
        include("inc/bandeau_aide.php");
        ?>
        <!--
          FIN NOUS AIDER
        -->

        <!--
          DEBUT TEMOIGNAGE
        -->
        <div class="container" id="temoignages">

            <div class="titre">
                <span>RENCONTRES</span>
                <h2>T&Eacute;MOIGNAGES DE R&Eacute;SIDENT.E.S</h2>
            </div>

            <div id="temoignages_bas" class="row">

                <div class="col-md-4">

                    <div class="image_temoin" style="background-image: url('images/image1.jpeg');"></div>
                    <div>
                        <h3>REN&Eacute;, 52 ANS</h3>
                        <p>
                            Menuisier, 52 ans, il vit une situation de grande précarité après avoir vécu de nombreuses années dans l'Est de la France...<br>
                            <a href="#"> Lire la suite &rarr;</a>
                        </p>

                    </div>
                </div>
                <div class="col-md-4">

                    <div class="image_temoin" style="background-image: url('images/image2.jpeg');"></div>
                    <div>
                        <h3>REN&Eacute;, 52 ANS</h3>
                        <p>
                            Menuisier, 52 ans, il vit une situation de grande précarité après avoir vécu de nombreuses années dans l'Est de la France...<br>
                            <a href="#"> Lire la suite &rarr;</a>
                        </p>

                    </div>
                </div>
                <div class="col-md-4">

                    <div class="image_temoin" style="background-image: url('images/image3.jpeg');"></div>
                    <div>
                        <h3>REN&Eacute;, 52 ANS</h3>
                        <p>
                            Menuisier, 52 ans, il vit une situation de grande précarité après avoir vécu de nombreuses années dans l'Est de la France...<br>
                            <a href="#"> Lire la suite &rarr;</a>
                        </p>

                    </div>
                </div>

            </div>
        </div>

        <!--
          FIN TEMOIGNAGE
        -->

        <!--
          DEBUT ACTU
        -->
        <div id="back">

            <div class="container" id="div0">

                <div class="titre">
                    <span>nos actualités</span>
                    <h2>LA VIE DE L ASSOCIATION, REVUE DE PRESSE, TEMPS FORTS...</h2>
                </div>

                <div class="row" id="actua">

                    <?php
                    
                    $sql="SELECT * FROM actualite ORDER BY date_creation DESC LIMIT 4";
                    $res = $dbh->prepare($sql);
                    $res->execute();

                    $actus = $res->fetchAll(PDO::FETCH_ASSOC);
                    
                    foreach($actus as $actu){
                        $img=SITE_URL."images/actu_img1.jpg";
                            
                        $html = $actu["contenu"];
                        $dom = new domDocument;
                        $dom->loadHTML($html);
                        $dom->preserveWhiteSpace = false;
                        $images = $dom->getElementsByTagName('img');
                        if(isset($images[0])){
                            $img=$images[0]->getAttribute('src');
                        }
                    ?>
                    <div class=" col-lg-3  col-sm-6 colblock ">
                        <div class="div2">
                            <div class="imactu" style="background-image: url('<?php echo $img;?>');">
                                <div class="date_actu">
                                    <span><?php echo date("d",strtotime($actu["date_creation"]));?></span><br> <?php echo date("m",strtotime($actu["date_creation"]));?><br> <?php echo date("Y",strtotime($actu["date_creation"]));?>
                                </div> 
                            </div>
                            <div class="actu">
                                <h5 class="ti"><?php echo $actu["titre"];?></h5>
                                <p><?php echo show_word($actu["contenu"],150);?></p>
                                <a href="<?php echo SITE_URL;?>actualite-<?php echo $actu["url"];?>">Lire la suite&nbsp; <i class="fas fa-long-arrow-alt-right"></i></a>
                            </div>
                        </div>

                    </div>

                    <?php
                    }
                    ?>

                </div>

            </div>


        </div>
        <!--
          FIN ACTU
        -->
        <?php
        include("inc/footer.php");
        ?>

    </body>
</html>

