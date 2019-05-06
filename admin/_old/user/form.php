
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include("../head.php");
    ?>
</head>
<body>
    <div id="wrapper">
        <?php
            include("../menu.php");
        ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><?php echo $title;?></h1>
                    </div>
                </div>
            
                <div class="row">
                    <div class="col-lg-6">

                        <form enctype="multipart/form-data" action="<?php echo SITE_URL;?>user/index.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $id;?>">
                            <?php
                            if(isset($_SESSION["error"])){
                            ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php
                                        foreach ($_SESSION["error"] as $key => $e) {
                                    ?>
                                        <li><?php echo $e;?></li>
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
                                <input type="text" class="form-control" name="nom" value="<?php echo $nom;?>" placeholder="Nom">
                            </div>
                            <div class="form-group">
                                <label>Prénom * :</label>
                                <input type="text" class="form-control" name="prenom" value="<?php echo $prenom;?>" placeholder="Prénom">
                            </div>
                            <div class="form-group">
                                <label>Login * :</label>
                                <input type="email" class="form-control" name="email" value="<?php echo $login;?>" placeholder="Login">
                            </div>
                            <div class="form-group">
                                <label>Mot de passe * :</label>
                                <input type="password" class="form-control" name="password" value="<?php echo $password;?>" placeholder="Mot de passe">
                            </div>
                            
                            
                            <div class="form-group">
                                <a href="<?php echo SITE_URL;?>user/index.php" class="btn btn-warning">Retour liste</a>
                                <input type="submit" value="valider" name="bt_add_user" class="btn btn-success">
                            </div>
                        </form>

                        
                    </div>
                    <!-- /.col-lg-6 (nested) -->
                </div>
            </div>
        </div>
    </div>
    <?php
        include("../footer.php");
    ?>
</body>
</html>