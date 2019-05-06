<?php
include("inc/conf.php");
if (!is_logged()) {
    header("location:login.php");
    die;
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <?php
        $title = "Tableau de bord";
        include("inc/head.php");
        ?>

    </head>

    <body>

        <div id="wrapper">

            <?php
            include("inc/menu.php");
            ?>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tableau de bord</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <a href="<?php echo SITE_URL;?>user" class="btn btn-block btn-success"><i class="fa fa-users fa-3x"></i><br>Utilisateurs</a>
                    </div>
                    <div class="col-md-3">
                        <a href="<?php echo SITE_URL;?>actu" class="btn btn-block btn-info"><i class="fa fa-newspaper-o fa-3x"></i><br>Actualités</a>
                    </div>
                    <div class="col-md-3">
                        <a href="<?php echo SITE_URL;?>page" class="btn btn-block btn-primary"><i class="fa fa-file fa-3x"></i><br>Pages</a>
                    </div>
                    <div class="col-md-3">
                        <a href="<?php echo SITE_URL;?>" class="btn btn-block btn-default" target="_blank"><i class="fa fa-globe fa-3x"></i><br>Site web</a>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <?php
        include("inc/footer.php");
        ?>


    </body>

</html>
