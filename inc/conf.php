<?php
session_start();
define("SITE_URL","http://localhost/atherbea/");

define("USER_BDD","atherbea");
define("MDP_BDD","slY6px9nnjrSQ1RC");

$dbh = new PDO('mysql:host=localhost;dbname=atherbea;charset=UTF8', USER_BDD, MDP_BDD);

function debug($tab){
  echo "<pre>";
  print_r($tab);
  echo "</pre>";
}

function show_word($texte,$nb_char=100){
    $contenu=$texte;
    $contenu=strip_tags($contenu);
    $contenu=html_entity_decode($contenu);
    $contenu=substr($contenu,0,$nb_char);

    $contenu = str_replace("\n", " ", $contenu);

    $tab_contenu=explode(" ",$contenu);
    $nb=count($tab_contenu)-1;
    
    $text="";
    foreach($tab_contenu as $item => $value){
        if($item<$nb){
            $text.=$value." ";
        }

    }
    return $text."...";
}

?>
