<?php

include("../inc/conf.php");
if (!is_logged()) {
    header("location:" . SITE_URL . "login.php");
    die;
}

if (isset($_GET["del"])) {
    $sql = "DELETE FROM user WHERE id=?";
    $sth = $dbh->prepare($sql);
    $sth->execute(array($_GET["id"]));
    header("location:" . SITE_URL . "user/index.php");
    die;
}


if (isset($_GET["actif"])) {
    $actif = $_GET["actif"];
    $id = $_GET["id"];
    //echo 'statue =' . $actif . '<br/>' . 'id =' . $id;
    $sql = "UPDATE user SET actif=$actif WHERE id=$id";
    $sth = $dbh->prepare($sql);
    $sth->execute();
    //echo '<p>lalala</p>';

    $url= 'wwww';
    $html= 'HTML';
    $data = array($url,$html);
    //$data[url] = $url;
    //$data[html] = $html;
    print json_encode($data);
    //header("location:" . SITE_URL . "user/index.php");
    die;
}

//bt_add_user est le name du submit du formulaire de la page add_user.php.
//Si $_POST["bt_add_user"] n'existe pas c'est qu'on pas cliqué sur le button submit, donc on redirige vers l'index
if (!isset($_POST["bt_add_user"])) {
    header("location:" . SITE_URL . "user/index.php");
    die;
}

//initialisation d'une variable indiquant si il y a des erreurs
$error = false;

//vérification si le nom est vide
if (empty($_POST["nom"])) {
    $_SESSION["error"][] = "Siasir un nom."; //on ajoute un message d'erreur à la session pour l'afficher dans le formulaire
    $error = true;
}

//vérification si le prénom est vide
if (empty($_POST["prenom"])) {
    $_SESSION["error"][] = "Siasir un prénom."; //on ajoute un message d'erreur à la session pour l'afficher dans le formulaire
    $error = true;
}

//vérification si l'email est vide
if (empty($_POST["email"])) {
    $_SESSION["error"][] = "Siasir un login."; //on ajoute un message d'erreur à la session pour l'afficher dans le formulaire
    $error = true;
} else {
    //vérification si l'email est au bon format
    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $_SESSION["error"][] = "Le login doit-être un email !"; //on ajoute un message d'erreur à la session pour l'afficher dans le formulaire
        $error = true;
    }
}

//vérification si le mot de passe est vide
if (empty($_POST["password"])) {
    $_SESSION["error"][] = "Siasir un mot de passe."; //on ajoute un message d'erreur à la session pour l'afficher dans le formulaire
    $error = true;
}


if ($error == false) {
    // il n'y a pas d'erreur
    $sql_user = "SELECT * FROM user WHERE email=? AND id<>" . $_POST["id"];
    $sth = $dbh->prepare($sql_user);
    $sth->execute(array($_POST["email"]));
    $user = $sth->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $_SESSION["error"][] = "L'utilisateur existe déjà.";
    } else {
        if ($_POST["id"] == 0) {
            //on ajoute un user
            $sql = "INSERT INTO user (id,nom,prenom,email,password) VALUES  (NULL,'" . $_POST["nom"] . "','" . $_POST["prenom"] . "','" . $_POST["email"] . "','" . password_hash($_POST["password"], PASSWORD_DEFAULT) . "')";
        } else {
            //on modifie un user
            $sql = "UPDATE user SET nom='" . $_POST["nom"] . "', prenom='" . $_POST["prenom"] . "', email='" . $_POST["email"] . "', password='" . "" . "' WHERE id=" . $_POST["id"];
            $sql = "UPDATE user SET nom='" . $_POST["nom"] . "', prenom='" . $_POST["prenom"] . "', email='" . $_POST["email"] . "', password='" . password_hash($_POST["password"], PASSWORD_DEFAULT) . "' WHERE id=" . $_POST["id"];
        }

        $sth = $dbh->prepare($sql);
        $sth->execute();
        header("location:" . SITE_URL . "user/index.php");
        die;
    }
}

// il n'y a des erreur
$_SESSION["post"] = $_POST;
if ($_POST["id"] > 0) {
    $url = SITE_URL . "user/form.php?id=" . $_POST["id"];
} else {
    $url = SITE_URL . "user/form.php";
}
header("location:" . $url);
die;
?>