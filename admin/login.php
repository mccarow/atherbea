<?php
include("inc/conf.php");
//echo password_hash('azerty', PASSWORD_DEFAULT);
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <?php
        $title = "Connexion";
        include("inc/head.php");
        ?>

    </head>

    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo $title; ?></h3>
                        </div>
                        <div class="panel-body">
                            <?php
                            //debug($_SESSION);
                            if (isset($_SESSION["error"])) {
                                ?>
                                <div class="alert alert-danger">
                                    <ul>
                                        <?php
                                        foreach ($_SESSION["error"]["message"] as $m) {
                                            echo "<li>" . $m . "</li>";
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <?php
                                unset($_SESSION["error"]);
                            }
                            ?>

                            <?php
                            $login = (isset($_SESSION["post"]["login"])) ? $_SESSION["post"]["login"] : "";
                            ?>
                            <form action="connexion.php" method="post" role="form">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Login" name="login" type="text" value="<?php echo $login; ?>" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                        </label>
                                        <a href="http://localhost/atherbea/admin/user/recoverymdp.php" class="btn btn-danger">mot de passe oublié?</a>
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <button  type="submit" class="btn btn-lg btn-success btn-block">Se connecter</button>
                                </fieldset>
                            </form>
                            <?php
                            unset($_SESSION["post"]);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
            include("inc/footer.php");
        ?>

    </body>

</html>
