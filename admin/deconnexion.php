<?php
    include("inc/conf.php");
    session_start();
    session_destroy();
    header("location:index.php");
    die;
?>