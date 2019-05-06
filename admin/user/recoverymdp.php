<?php
include("../inc/conf.php");
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <?php
        $title = "Saisissez votre email";
        include("../inc/head.php");
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
                            <form action="verifmail.php" method="post" role="form">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Email" name="login" type="text" value="<?php echo $login; ?>"  autofocus>
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <button  type="submit" class="btn btn-lg btn-success btn-block">Valider</button>
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
            include("../inc/footer.php");
        ?>

    </body>

</html>

