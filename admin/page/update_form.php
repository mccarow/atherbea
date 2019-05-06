<?php
include("../inc/conf.php");
if(!is_logged()){
    header("location:".SITE_URL."login.php");
    die;
}

$title="Modifier une page";

$sql="SELECT * FROM page WHERE id=".$_GET["id"];
$res = $dbh->prepare($sql);
$res->execute();

$page = $res->fetch(PDO::FETCH_ASSOC);



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

                        <form action="<?php echo SITE_URL?>page/update_page.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $page["id"];?>">
                            <div class="form-group">
                                <label>Catégorie : </label>
                                <select name="id_categorie" class="form-control">
                                    <option value="0">-</option>
                                    <?php
                                    $sql="SELECT * FROM categorie ORDER BY libelle";
                                    $res = $dbh->prepare($sql);
                                    $res->execute();
                                    $catges = $res->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($catges as $categ){
                                    ?>
                                    <option <?php echo ($categ["id"]==$page["id_categorie"])?'selected="selected"':'';?> value="<?php echo $categ["id"];?>"><?php echo $categ["libelle"];?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>titre : </label>
                                <input class="form-control" type="text" name="titre" value="<?php echo $page["titre"];?>" required="required">
                            </div>
                            <div class="form-group">
                                <label>url : </label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="url" value="<?php echo $page["url"];?>" required="required">
                                    <div class="input-group-addon">.html</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Contenu : </label>
                                <textarea class="form-control" name="contenu" id="txt_contenu"><?php echo $page["contenu"];?></textarea>
                                <script>
                                    var editor = CKEDITOR.replace( 'txt_contenu' );
                                    CKFinder.setupCKEditor( editor,  '<?php echo SITE_URL;?>dist/ckfinder/');
                                </script>
                            </div>
                            <div class="form-group">
                                <a href="<?php echo SITE_URL;?>page/index.php" class="btn btn-warning">Retour liste</a>
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