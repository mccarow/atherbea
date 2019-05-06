<?php

include("../inc/conf.php");
if (!is_logged()) {
    header("location::" . SITE_URL . "login.php");
    die;
}
debug($_POST);

$sql = "SELECT * FROM user WHERE id=" . $_POST["id"];
$sth = $dbh->prepare($sql);
$sth->execute();
$user = $sth->fetch(PDO::FETCH_ASSOC);

debug($user);

if (password_verify($_POST["password"], $user["password"])) {
    echo "ancien mdp est correct<br/>";
            if ($_POST["new_password"]!== $_POST["new_password2"]) {
            echo "les nouveaux mots de passe ne sont pas les mêmes<br/>";
            } 
            else {
            echo "les nouveaux mots de passe sont les mêmes<br/>";
                if($_POST["new_password"]!==""){
                    
                    $sql = "INSERT INTO user (id,nom,prenom,email,password) VALUES  (NULL,'" . $user["nom"] . "','" . $user["prenom"] . "','" . $user["email"] . "','" . password_hash($_POST["new_password"], PASSWORD_DEFAULT) . "')";
                            //INSERT INTO tabl (column1, column2, column3, ...)
                }
                else {
                  echo "ramplir les nouveaux mots de passe<br/>";  
                }
            }
        } else {
        echo "ancien mdp n'est pas correct";
    }
