<?php
include("../inc/conf.php");
if(!is_logged()){
    header("location:".SITE_URL."login.php");
    die;
}

$title="Ajouter une page";

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

                        <form action="<?php echo SITE_URL;?>page/add_page.php" method="post">
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
                                    <option value="<?php echo $categ["id"];?>"><?php echo $categ["libelle"];?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>titre : </label>
                                <input type="text" name="titre" class="form-control" required="required">
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label>url : </label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="url" value="" required="required">
                                        <div class="input-group-addon">.html</div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>
                                    Contenu : </label>
                                <textarea name="contenu" id="txt_contenu" class="form-control"></textarea>
                                <script>
                                    var editor = CKEDITOR.replace( 'txt_contenu' );
                                    CKFinder.setupCKEditor( editor,  '<?php echo SITE_URL;?>dist/ckfinder/');
                                </script>
                            </div>
                            <div class="form-group">
                                <a href="<?php echo SITE_URL;?>page/index.php" class="btn btn-warning">Retour liste</a>
                                <input type="submit" name="bt_add" value="Ajouter" class="btn btn-success">
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