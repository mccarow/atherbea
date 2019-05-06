<?php
include("inc/conf.php");

//$page=(isset($_GET["page"]))?$_GET["page"]:1;
if(isset($_GET["page"])){
    $page=$_GET["page"];
}else{
    $page=1;
}

if(filter_var($page, FILTER_VALIDATE_INT) === false){
    header("location:actualites.php");
    die;
}

if($page==1){
    $limit=0;
}else{
    $limit=($page-1)*5;
}

$sql = "SELECT * FROM actualite";
$res = $dbh->prepare($sql);
$res->execute();
$count = $res->rowCount();

$nb_page=ceil($count/5);

if($page>$nb_page || $page<1){
    header("location:actualites.php");
    die;
}

$sql = "SELECT * FROM actualite ORDER BY date_creation DESC LIMIT ".$limit.",5";
$res = $dbh->prepare($sql);
$res->execute();
$actus = $res->fetchAll(PDO::FETCH_ASSOC);

?>

<!doctype html>
<html lang="fr">
    <head>
        <?php include("inc/head.php"); ?>

        <title>Atherbea - Actualités</title>
        <meta name="description" content="Atherbea - Actualités" />
    </head>
    <body>
        <?php
        include("inc/header.php");
        ?>
        <section id="header_ariane" style="background-image: url('images/visuel/visuel_1.jpg');">
            <span>Actualités</span>
        </section>
        <section>
            <div class="container" id="contenu">
                <div class="titre">
                    <span>Atherbéa</span>
                    <h1>Actualités</h1>
                </div>
                <div>
                    <?php
                        foreach ($actus as $actu){
                            
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
                    <div class="d-flex row-actu">
                        <div class="visuel_actu" style="background-image: url('<?php echo $img;?>');" ></div>
                        <div class=" flex-grow-1" >
                            <div><?php echo date("d-m-Y",  strtotime($actu["date_creation"]));?></div>
                            <h3><?php echo $actu["titre"];?></h3>
                            <p><?php echo show_word($actu["contenu"],150);?></p>
                            <div><a href='<?php echo SITE_URL."actualite-".$actu["url"];?>'>Lire la suite</a></div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
                <div id="pagination" class="text-center">
                    <?php
                    $i=1;
                    while($i<=$nb_page){
                    ?>
                    <a href="actualites.php?page=<?php echo $i;?>" class="btn btn-primary"><?php echo $i;?></a>
                    <?php
                        $i++;
                    }
                    ?>
                    
                </div>
            </div>
        </section>
        <?php
        include("inc/bandeau_aide.php");

        include("inc/footer.php");
        ?>


    </body>
</html>
