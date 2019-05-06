<?php
include("../inc/conf.php");
if(!is_logged()){
    header("location:".SITE_URL."login.php");
    die;
}

$sql="UPDATE page SET titre=?, url=?, contenu=?, id_categorie=? WHERE id=?";

$res = $dbh->prepare($sql);
$data=array(
    $_POST["titre"],
    $_POST["url"],
    $_POST["contenu"],
    $_POST["id_categorie"],
    $_POST["id"]
);
$res->execute($data);

header("location:".SITE_URL."page/index.php");
die;

?>