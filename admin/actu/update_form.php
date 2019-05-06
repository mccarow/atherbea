<?php
include("../inc/conf.php");
if(!is_logged()){
    header("location:".SITE_URL."login.php");
    die;
}

$title="Modifier une actu";

$sql="SELECT * FROM actualite WHERE id=".$_GET["id"];
$res = $dbh->prepare($sql);
$res->execute();

$actu = $res->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include("../inc/head.php");
    ?>
</head>
<body>
    <div id="wrapper">
        <?php
            include("../inc/menu.php");
        ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><?php echo $title;?></h1>
                    </div>
                </div>
            
                <div class="row">
                    <div class="col-lg-12">

                        <form action="<?php echo SITE_URL?>actu/action.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $actu["id"];?>">
                            <div class="form-group">
                                <label>date : </label>
                                <input type="date" name="date_creation" class="form-control" value="<?php echo $actu["date_creation"];?>">
                            </div>
                            <div class="form-group">
                                <label>titre : </label>
                                <input class="form-control" type="text" name="titre" value="<?php echo $actu["titre"];?>">
                            </div>
                            <div class="form-group">
                                <label>url : </label>
                                <input class="form-control" type="text" name="url" value="<?php echo $actu["url"];?>">
                            </div>
                            <div class="form-group">
                                <label>Contenu : </label>
                                <textarea class="form-control" name="contenu" id="txt_contenu"><?php echo $actu["contenu"];?></textarea>
                                <script>
                                    var editor = CKEDITOR.replace( 'txt_contenu' );
                                    CKFinder.setupCKEditor( editor,  '<?php echo SITE_URL;?>dist/ckfinder/');
                                </script>
                            </div>
                            <div class="form-group">
                                <a href="<?php echo SITE_URL;?>actu/index.php" class="btn btn-warning">Retour liste</a>
                                <input type="submit" name="bt_update" class="btn btn-success" value="Modifier">
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        include("../inc/footer.php");
    ?>
</body>
</html>