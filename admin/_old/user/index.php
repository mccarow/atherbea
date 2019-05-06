<?php




if(isset($_POST["bt_add_user"])){
	
	//initialisation d'une variable indiquant si il y a des erreurs
	$error=false;

	//vérification si le nom est vide
	if(empty($_POST["nom"])){
	    $_SESSION["error"][]="Siasir un nom."; //on ajoute un message d'erreur à la session pour l'afficher dans le formulaire
	    $error=true;
	}

	//vérification si le prénom est vide
	if(empty($_POST["prenom"])){
	    $_SESSION["error"][]="Siasir un prénom."; //on ajoute un message d'erreur à la session pour l'afficher dans le formulaire
	    $error=true;
	}

	//vérification si l'email est vide
	if(empty($_POST["email"])){
	    $_SESSION["error"][]="Siasir un login."; //on ajoute un message d'erreur à la session pour l'afficher dans le formulaire
	    $error=true;
	}else{
	    //vérification si l'email est au bon format
		if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
			$_SESSION["error"][]="Le login doit-être un email !"; //on ajoute un message d'erreur à la session pour l'afficher dans le formulaire
			$error=true;
		}
	}

	//vérification si le mot de passe est vide
	if(empty($_POST["password"])){
	    $_SESSION["error"][]="Siasir un mot de passe."; //on ajoute un message d'erreur à la session pour l'afficher dans le formulaire
	    $error=true;
	}


	if($error==false){
	    // il n'y a pas d'erreur
		$sql_user="SELECT * FROM user WHERE email=? AND id<>".$_POST["id"];
		$sth = $dbh->prepare($sql_user);
	    $sth->execute(array($_POST["email"]));
	    $user = $sth->fetch(PDO::FETCH_ASSOC);

	    if($user){
	    	$_SESSION["error"][]="L'utilisateur existe déjà.";
	    }else{
	    	if($_POST["id"]==0){
	            //on ajoute un user
	            $sql="INSERT INTO user (id,nom,prenom,email,password) VALUES  (NULL,'".$_POST["nom"]."','".$_POST["prenom"]."','".$_POST["email"]."','".$_POST["password"]."')";
	        }else{
	            //on modifie un user
	            $sql="UPDATE user SET nom='".$_POST["nom"]."', prenom='".$_POST["prenom"]."', email='".$_POST["email"]."', password='".$_POST["password"]."' WHERE id=".$_POST["id"];
	        }
			$sth = $dbh->prepare($sql);
			$sth->execute();
			header("location:".SITE_URL."user/index.php");
	    	die;
	    }

		

	}

	// il n'y a des erreur
	$_SESSION["post"]=$_POST;
	if($_POST["id"]>0){
	    $url=SITE_URL."user/index.php?action=add&id=".$_POST["id"];
	}else{
	    $url=SITE_URL."user/index.php?action=add";
	}
	header("location:".$url);
	die;
}

$action="list";

if(isset($_GET["action"])){
	$action=$_GET["action"];
}

if($action=="del"){
    $sql="DELETE FROM user WHERE id=?";
    $sth = $dbh->prepare($sql);
    $sth->execute(array($_GET["id"]));
    header("location:".SITE_URL."user/index.php");
    die;
}

if($action=="list"){
	$sth = $dbh->prepare("SELECT * FROM user");
    $sth->execute();
    $users = $sth->fetchAll(PDO::FETCH_ASSOC);
}

if($action=="add"){
	//initialisation des variable d'ajout
	$title="Ajouter un utilisateur";

	$id=0;
	$nom="";
	$prenom="";
	$login="";
	$password="";
	if(isset($_SESSION["post"])){
	    $id=$_SESSION["post"]["id"];
	    $nom=$_SESSION["post"]["nom"];
	    $prenom=$_SESSION["post"]["prenom"];
	    $login=$_SESSION["post"]["email"];
	    $password=$_SESSION["post"]["password"];
	    unset($_SESSION["post"]);
	}elseif(isset($_GET["id"])){
	    //modification des vairable en modification
	    $title="Modifier un utilisateur";

	    $sql="SELECT * FROM user WHERE id=".$_GET["id"];
	    $sth = $dbh->prepare($sql);
	    $sth->execute();
	    $user = $sth->fetch(PDO::FETCH_ASSOC);
	    $id=$user["id"];
	    $nom=$user["nom"];
	    $prenom=$user["prenom"];
	    $login=$user["email"];
	    $password=$user["password"];
	}
}

if($action=="fiche"){
	$sql="SELECT * FROM user WHERE id=".$_GET["id"];
    $sth = $dbh->prepare($sql);
    $sth->execute();
    $user = $sth->fetch(PDO::FETCH_ASSOC);
	$title="Fiche du user";
}

include($action.".php");
die;
?>