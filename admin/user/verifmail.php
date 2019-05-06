<?php

include("../inc/conf.php");
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


if ($error == 1) {
    header("location:recoverymdp.php");
} else {
    $login = $_POST["login"];

    $sql = "SELECT * FROM user WHERE email='$login'";
    $sth = $dbh->prepare($sql);
    $sth->execute(array($_POST["login"]));
    $user = $sth->fetch(PDO::FETCH_ASSOC);
}
//!!!!!!!!!!!
if (isset($user["email"])) {
      
    
    
    
    
} else {
    $_SESSION["error"]["message"][] = "Le email n'existe pas.";
    $error = 1;
    header("location:recoverymdp.php");
}









/*if email!==email in DB{
    echo:email doesn't exist'
    
}
else {
    
}

    
    
    
    //if($user!==($_POST["login"]))
?>
*/