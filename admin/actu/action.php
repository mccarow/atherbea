<?php

include("../inc/conf.php");
if (!is_logged()) {
    header("location:" . SITE_URL . "login.php");
    die;
}

//$sql="INSERT INTO page (id, titre, url, contenu) VALUES (NULL, '".$_POST["titre"]."', '".$_POST["url"]."', '".$_POST["contenu"]."')";

if (isset($_GET["del"])) {
    $data["success"] = false;
    $data["message"] = "";

    $sql = "DELETE FROM actualites WHERE id=?";
    $res = $dbh->prepare($sql);
    //$res->execute(array($_GET["id"]));

     if ($res->execute(array($_GET["id"]))) {
      $data["success"] = true;
      $data["message"] = "Supression realisée.";
      }
      else{
      $data["success"] = false;
      $data["message"] = "Supression n'est pas realisée.";
      }
      echo json_encode($data);
    die;
}


if (isset($_POST["bt_add"])) {
    $sql = "INSERT INTO actualite (id, titre, url, contenu, date_creation) VALUES (NULL, ?, ?, ?, ?)";
    $res = $dbh->prepare($sql);
    $res->execute(array($_POST["titre"], $_POST["url"], $_POST["contenu"], $_POST["date_creation"]));
} else {
    $sql = "UPDATE actualite SET titre=?, url=?, contenu=?, date_creation=? WHERE id=?";
    $res = $dbh->prepare($sql);
    $res->execute(array($_POST["titre"], $_POST["url"], $_POST["contenu"], $_POST["date_creation"], $_POST["id"]));
}

header("location:" . SITE_URL . "actu/index.php");
die;
?>