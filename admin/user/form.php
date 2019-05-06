<?php
include("../inc/conf.php");
if (!is_logged()) {
    header("location:".SITE_URL."login.php");
    die;
}

//initialisation des variable d'ajout
$title = "Ajouter un utilisateur";

$id = 0;
$nom = "";
$prenom = "";
$login = "";
$password = "";
if (isset($_SESSION["post"])) {
    $id = $_SESSION["post"]["id"];
    $nom = $_SESSION["post"]["nom"];
    $prenom = $_SESSION["post"]["prenom"];
    $login = $_SESSION["post"]["email"];
    $password = $_SESSION["post"]["password"];
    unset($_SESSION["post"]);
} elseif (isset($_GET["id"])) {
    //modification des vairable en modification
    $title = "Modifier un utilisateur";

    $sql = "SELECT * FROM user WHERE id=" . $_GET["id"];
    $sth = $dbh->prepare($sql);
    $sth->execute();
    $user = $sth->fetch(PDO::FETCH_ASSOC);
    $id = $user["id"];
    $nom = $user["nom"];
    $prenom = $user["prenom"];
    $login = $user["email"];
    $password = $user["password"];
}
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
                            <h1 class="page-header"><?php echo $title; ?></h1>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">

                            <form enctype="multipart/form-data" action="<?php echo SITE_URL;?>user/action.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <?php
                                if (isset($_SESSION["error"])) {
                                    ?>
                                    <div class="alert alert-danger">
                                        <ul>
                                            <?php
                                            foreach ($_SESSION["error"] as $key => $e) {
                                                ?>
                                                <li><?php echo $e; ?></li>
                                                <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <?php
                                }
                                unset($_SESSION["error"]);
                                ?>

                                <div class="form-group">
                                    <label>Nom * :</label>
                                    <input type="text" class="form-control" name="nom" value="<?php echo $nom; ?>" placeholder="Nom">
                                </div>
                                <div class="form-group">
                                    <label>Prénom * :</label>
                                    <input type="text" class="form-control" name="prenom" value="<?php echo $prenom; ?>" placeholder="Prénom">
                                </div>
                                <div class="form-group">
                                    <label>Login * :</label>
                                    <input type="email" class="form-control" name="email" value="<?php echo $login; ?>" placeholder="Login">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" value="<?php echo $password; ?>" placeholder="password">
                                </div>


                                <div class="form-group">
                                    <label>Mot de pass :</label>
                                    <a href="<?php echo SITE_URL;?>user/index.php" class="btn btn-warning">Retour liste</a>
                                    <input type="submit" value="valider" name="bt_add_user" class="btn btn-success">
                                    <a href="<?php echo SITE_URL;?>user/formupdate.php?id=<?php echo $id; ?>" class="btn btn-info">Modifier le mot de passe</a>
                                </div>
                            </form>


                        </div>
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                </div>
            </div>
        </div>
        <?php
        include("../inc/footer.php");
        ?>
    </body>
</html>