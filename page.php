<?php
include("inc/conf.php");

$sql = "SELECT *  FROM page LEFT JOIN categorie ON categorie.id = page.id_categorie WHERE url='" . $_GET["url"] . "'";
$res = $dbh->prepare($sql);
$res->execute();

$page = $res->fetch(PDO::FETCH_ASSOC);

if (!$page) {
    header("location:index.php");
    die;
}
?>

<!doctype html>
<html lang="fr">
    <head>
        <?php include("inc/head.php"); ?>

        <title>Atherbea - <?php echo $page["titre"];?></title>
        <meta name="description" content="Atherbea - <?php echo $page["titre"];?>" />
    </head>
    <body>
        <?php
        include("inc/header.php");
        ?>
        <section id="header_ariane" style="background-image: url('images/visuel/visuel_1.jpg');">
            <?php echo $page["libelle"]; ?><br />
            <span><?php echo $page["titre"]; ?></span>
        </section>
        <section>
            <div class="container" id="contenu">
                <div class="titre">
                    <span><?php echo $page["libelle"]; ?></span>
                    <h1><?php echo $page["titre"]; ?></h1>
                </div>

                <div>
                    <?php 
                    echo $page["contenu"]; ?>
                </div>
            </div>
        </section>
        <?php
        include("inc/bandeau_aide.php");

        include("inc/footer.php");
        ?>


    </body>
</html>

