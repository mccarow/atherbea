<?php
include("../inc/conf.php");
if(!is_logged()){
    header("location:".SITE_URL."login.php");
    die;
}

//$sql="INSERT INTO page (id, titre, url, contenu) VALUES (NULL, '".$_POST["titre"]."', '".$_POST["url"]."', '".$_POST["contenu"]."')";

$sql="INSERT INTO page (id, titre, url, contenu, id_categorie) VALUES (NULL, ?, ?, ?, ?)";

$res = $dbh->prepare($sql);
$res->execute(array($_POST["titre"],$_POST["url"],$_POST["contenu"], $_POST["id_categorie"]));

header("location:".SITE_URL."page/index.php");
die;
?>