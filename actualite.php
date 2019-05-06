<?php
include("inc/conf.php");

$sql = "SELECT * FROM actualite WHERE url='" . $_GET["url"] . "'";
$res = $dbh->prepare($sql);
$res->execute();

$actu = $res->fetch(PDO::FETCH_ASSOC);

if (!$actu) {
    header("location:index.php");
    die;
}
?>

<!doctype html>
<html lang="fr">
    <head>
        <?php include("inc/head.php"); ?>

        <title>Atherbea - Actualité : <?php echo $actu["titre"];?></title>
        <meta name="description" content="Atherbea - Actualités : <?php echo $actu["titre"];?>" />
    </head>
    <body>

        <?php
        include("inc/header.php");
        ?>
        <section id="header_ariane" style="background-image: url('images/visuel/visuel_1.jpg');">
            <span><a href="<?php SITE_URL;?>actualites.php">actualités</a> / <?php echo $actu["titre"]; ?></span>
        </section>
        <section>
            <div class="container" id="contenu">
                <div class="titre">
                    <span><?php echo date("d-m-Y",  strtotime($actu["date_creation"]));?></span>
                    <h1><?php echo $actu["titre"];?></h1>
                </div>
                
                <div>
                     <?php echo $actu["contenu"];?>
                </div>
            </div>
        </section>
        <?php
        include("inc/bandeau_aide.php");

        include("inc/footer.php");
        ?>


    </body>
</html>