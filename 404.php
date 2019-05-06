<?php
include("inc/conf.php");
?>

<!doctype html>
<html lang="fr">
    <head>
        <?php include("inc/head.php"); ?>

        <title>Atherbea - Page introuvable</title>
        <meta name="description" content="Page introuvable" />
    </head>
    <body>

        <?php
        include("inc/header.php");
        ?>
        <section id="header_ariane" style="background-image: url('images/visuel/visuel_1.jpg');">
            <span>Page introuvable</span>
        </section>
        <section>
            <div class="container" id="contenu">
                <div class="block" id="titre">

                    <h1>Page introuvable!</h1>
                </div>

                <div>
                    Cette page est introuvable!
                </div>
            </div>
        </section>
        <?php
        include("inc/bandeau_aide.php");

        include("inc/footer.php");
        ?>


    </body>
</html>

