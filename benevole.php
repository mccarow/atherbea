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
                    <h1>je veux devenir bénévole</h1>
                </div>

                <div>
                    <?php
                    if (isset($_SESSION["error"])) {
                        if ($_SESSION["error"] == true) {
                            ?>
                            <div class="alert alert-danger">
                                Une erreur est survenue lors de l'envoi du message !
                            </div>
                            <?php
                        } else {
                            ?>
                            <div class="alert alert-success">
                                Votre message à bien été envoyé !
                            </div>
                            <?php
                        }
                        unset($_SESSION["error"]);
                    }
                    ?>
                    <form action="#" method="post" name="send_form">
                        <input type="radio" name="gender" value="male"> Male<br>
                        <input type="radio" name="gender" value="female"> Female<br>
                        <input type="radio" name="gender" value="other"> Other
                        <div class="form-group row">
                            <div class="col-md-4">
                                <input type="text" name="nom" placeholder="Nom *" class="form-control" />
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="prenom" placeholder="Prenom *" class="form-control" />
                            </div>
                            <div class="col-md-4">
                                <input type="email" name="email" placeholder="Email *" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-8">
                                <textarea name="fonction" placeholder="fonction *" class="form-control"></textarea>
                            </div>
                            <div class="col-md-4">
                                Disponibilité
                                <input list="dispo" name="dispo">
                                <datalist id="dispo">
                                    <option value="Matin">
                                    <option value="Journee">
                                    <option value="Soir">
                                    <option value="Weekend">
                                </datalist>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea name="commentaire" placeholder="Commentaire *" class="form-control"></textarea>
                        </div>


                        <!--div class="form-group">
                            <div class="g-recaptcha" data-sitekey="6LeuAIoUAAAAANryNWp6QuFCY1njpHuWUTxc0QBW"></div>
                        </div-->
                        <div class="form-group">
                            <input type="submit" value="Envoyer" name="bt_send" class="btn btn-success" onclick="validateForm()"/>
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
        <script type="text/javascript">
            /*var arr = ["nom", "prenom", "email", "fonction", "dispo", "Commentaire"];
             
             arr.forEach(function(item, i, arr) {
             alert( i + ": " + item + " (массив:" + arr + ")" );
             });*/

            function validateForm() {
                var gender = document.forms["send_form"]["gender"].value;
                var nom = document.forms["send_form"]["nom"].value;
                var prenom = document.forms["send_form"]["prenom"].value;
                var email = document.forms["send_form"]["email"].value;
                var fonction = document.forms["send_form"]["fonction"].value;
                var dispo = document.forms["send_form"]["dispo"].value;
                var commentaire = document.forms["send_form"]["commentaire"].value;
                if (gender == "") {
                    alert("Saisir gender");
                    return false;
                } else if (nom == "") {
                    alert("Saisir le nom");
                    return false;
                } else if (prenom == "") {
                    alert("Saisir le prenom");
                    return false;
                } else if (email == "") {
                    alert("Saisir le email");
                    return false;
                } else if (fonction == "") {
                    alert("Saisir le fonction");
                    return false;
                } else if (dispo == "") {
                    alert("Saisir le dispo");
                    return false;
                } else if (commentaire == "") {
                    alert("Saisir le commentaire");
                    return false;
                }
                    alert(gender + ' ' + nom + ' ' + prenom + ' ' + email + ' ' + fonction + ' ' + dispo + ' ' + commentaire);
            }
        </script>
    </body>
</html>

