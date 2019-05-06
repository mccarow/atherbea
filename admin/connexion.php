<?php

include("inc/conf.php");

$error = 0;

if (empty($_POST["login"])) {
    $_SESSION["error"]["message"][] = "Le login est vide !";
    $error = 1;
} else {
    if (!filter_var($_POST["login"], FILTER_VALIDATE_EMAIL)) {
        $_SESSION["error"]["message"][] = "Le login doit-être un email !";
        $error = 1;
    }
}

if (empty($_POST["password"])) {
    $_SESSION["error"]["message"][] = "Le mot de passe est vide !";
    $error = 1;
}

if ($error == 0) {
    $sql = "SELECT * FROM user WHERE email=? ";
    $sth = $dbh->prepare($sql);
    $sth->execute(array($_POST["login"]));
    $user = $sth->fetch(PDO::FETCH_ASSOC);


    if ($user) {
        if (password_verify($_POST["password"], $user["password"])){
            //echo "Connexion OK";
            $_SESSION["login"] = 1;
            header("location:index.php");
            die;
        } else {
            $_SESSION["error"]["message"][] = "Le mot de passe incorrect !";
        }
    } else {
        $_SESSION["error"]["message"][] = "Le login n'existe pas !";
    }
}

unset($_POST["password"]);
$_SESSION["post"] = $_POST;
header("location:login.php");
die;
?>