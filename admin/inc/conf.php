<?php
session_start();
define("SITE_URL","http://localhost/atherbea/admin/");

define("USER_BDD","atherbea");
define("MDP_BDD","slY6px9nnjrSQ1RC");

$dbh = new PDO('mysql:host=localhost;dbname=atherbea;charset=UTF8', USER_BDD, MDP_BDD);

function debug($tab){
  echo "<pre>";
  print_r($tab);
  echo "</pre>";
}

function is_logged(){
  if(isset($_SESSION["login"]) && $_SESSION["login"]==1){
    return true;
  }else{
    return false;
  }
}
?>
