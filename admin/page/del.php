<?php
include("../inc/conf.php");
if(!is_logged()){
    header("location:".SITE_URL."login.php");
    die;
}

$sql="DELETE FROM page WHERE id=?";

$res = $dbh->prepare($sql);
$data=array(
    $_GET["id"]
);
$res->execute($data);

header("location:".SITE_URL."page/index.php");
die;

?>