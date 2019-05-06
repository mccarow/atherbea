<?php
include("inc/conf.php");
?>

<!doctype html>
<html lang="fr">
    <head>
        <?php include("inc/head.php"); ?>

        <title>Atherbea - Nous contacter</title>
        <meta name="description" content="Atherbea - nous contacter" />
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>
    <body>

        <?php
        include("inc/header.php");
        
        ?>
        <section id="header_ariane" style="background-image: url('images/visuel/visuel_1.jpg');">
            <span>Atherbéa - Nous contacter</span>
        </section>
        <section>
            <div class="container" id="contenu">
                <div class="titre">
                    <span>Atherbéa</span>
                    <h1>Nous contacter</h1>
                </div>

                <div>
                    <?php
                    if(isset($_SESSION["error"])){
                        if($_SESSION["error"]==true){
                    ?>
                    <div class="alert alert-danger">
                        Une erreur est survenue lors de l'envoi du message !
                    </div>
                    <?php
                        }else{
                    ?>
                    <div class="alert alert-success">
                        Votre message à bien été envoyé !
                    </div>
                    <?php
                        }
                        unset($_SESSION["error"]);
                    }
                    ?>
                    <form action="send.php" method="post" name="send_form">
                        <div class="form-group">
                            <input type="text" name="sujet" placeholder="Sujet *"  class="form-control" />
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input type="text" name="nom" placeholder="Nom *" required="required" class="form-control" />
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" placeholder="Email *"  required="required" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea name="contenu" placeholder="Contenu *"  required="required" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="g-recaptcha" data-sitekey="6LeuAIoUAAAAANryNWp6QuFCY1njpHuWUTxc0QBW"></div>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Envoyer" name="bt_send" class="btn btn-success" />
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <div class="clear"></div>
        <?php
        include("inc/bandeau_aide.php");

        include("inc/footer.php");
        ?>

    </body>
</html>

