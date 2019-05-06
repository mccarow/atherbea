<?php
session_start();
$nom=$_POST["nom"];
$prenom=$_POST["prenom"];
$email=$_POST["email"];


if($nom!="" && $prenom!="" && $email!=""){
	$contenu=date("Y-m-d H:i:s").";".$nom.";".$prenom.";".$email."\r\n";
	file_put_contents("inscris_newsletter.txt", $contenu, FILE_APPEND);
	$_SESSION["error_formulaire"]=0;
	header("location:index.php");
}else{

	if(empty($nom)){
		$_SESSION["error_message"][]="Saisir le nom";
	}

	if(empty($prenom)){
		$_SESSION["error_message"][]="Saisir le prenom";
	}

	if(empty($email)){
		$_SESSION["error_message"][]="Saisir le email";
	}

	$_SESSION["error_formulaire"]=1;
	header("location:index.php");
}

?> 
