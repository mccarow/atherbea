<?php
include("../inc/conf.php");
if(!is_logged()){
    header("location:".SITE_URL."login.php");
    die;
}

$title="Liste des pages";

$sql="SELECT * FROM page";
$res = $dbh->prepare($sql);
$res->execute();

$pages = $res->fetchAll(PDO::FETCH_ASSOC);

//debug($pages);

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
                        <a href="add_form.php" class="btn btn-primary">Ajouter une page</a>

                        <table class="table table-bordered">
                            <tr>
                                <th>id</th>
                                <th>titre</th>
                                <th>url</th>
                                <th class="text-center">action</th>
                            </tr>
                            <?php

                            foreach ($pages as $key => $value) {
                                
                            ?>
                                <tr>
                                    <td><?php echo $value["id"];?></td>
                                    <td><a href="<?php echo SITE_URL;?>page/update_form.php?id=<?php echo $value["id"];?>"><?php echo $value["titre"];?></a></td>
                                    <td><?php echo $value["url"];?>.html</td>
                                    <td class="text-center"><a href="<?php echo SITE_URL;?>page/del.php?id=<?php echo $value["id"];?>" class="del"><i class="fa fa-lg fa-trash-o"></i></a></td>
                                </tr>
                            <?php
                            }
                            ?>
                            
                        </table>

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