<?php
include("../inc/conf.php");
if (!is_logged()) {
    header("location:" . SITE_URL . "login.php");
    die;
}
//initialisation des variable d'ajout
$title = "modifier le mot de passe";
debug($_POST);
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
                    <form enctype="multipart/form-data" action="<?php echo SITE_URL; ?>user/action1.php" method="post">
                        <div class="form-group">
                            <label>Tapez ancien mot de passe  :</label>
                            <input type="password" class="form-control" name="password" value="" placeholder="Mot de passe">
                            <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">
                        </div>

                        <div class="form-group">
                            <label>Tapez nouveau mot de passe  :</label>
                            <input type="password" class="form-control" name="new_password" value="" placeholder="Mot de passe">
                        </div>
                        <div class="form-group">
                            <label>Retapez nouveau mot de passe  :</label>
                            <input type="password" class="form-control" name="new_password2" value="" placeholder="Mot de passe">
                        </div>


                        <div class="form-group">
                            <a href="<?php echo SITE_URL; ?>user/index.php" class="btn btn-warning">Retour liste</a>
                            <input type="submit" value="valider" name="bt_add_user" class="btn btn-success">
                        </div> 
                    </form>
                </div>
            </div>
            <?php
            include("../inc/footer.php");
            ?>
        </div>
    </body>
</html>