<?php
include("inc/conf.php");


$response = $_POST["g-recaptcha-response"];
$url = 'https://www.google.com/recaptcha/api/siteverify';
$data = array(
    'secret' => '6LeuAIoUAAAAAFHM4vSAC4FAupOMJ6K_wneATUnY',
    'response' => $response
);
$options = array(
    'http' => array(
        'method' => 'POST',
        'content' => http_build_query($data)
    )
);
$context = stream_context_create($options);
$verify = file_get_contents($url, false, $context);

$captcha_success = json_decode($verify);

if ($captcha_success->success==false) {
    //le captcha n'est pas bon
    $_SESSION["error"]=true;
    header("location:contact.php");
    die;
}


include("plugins/phpmailer/autoload.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST["bt_send"])) {
    $error = true;
    if (!empty($_POST["sujet"]) && !empty($_POST["nom"]) && !empty($_POST["email"]) && !empty($_POST["contenu"])) {
        $message = "Nom : " . $_POST["nom"] . "\r\n";
        $message.="Email : " . $_POST["email"] . "\r\n";
        $message.="Message : " . $_POST["contenu"];
        
        ob_clean();
        ob_start();
        include("inc/mail.tpl.php");
        $message_html = ob_get_contents();
        ob_end_clean();

        $mail = new PHPMailer(true);
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.orange.fr';
        $mail->SMTPAuth = false;
        $mail->Port = 25;
        $mail->XMailer = "Atherbea";
        $mail->CharSet = 'UTF-8';
        //Recipients
        $mail->setFrom('julien.gafari@afpa.fr', 'Julien Gafari');
        $mail->addAddress('julien.gafari@afpa.fr', 'Julien Gafari');
        //Content
        $mail->isHTML(true);
        $mail->Subject = "Message du site Web : ".$_POST["sujet"];
        $mail->Body = $message_html;
        $mail->AltBody = $message;


        if ($mail->send()) {
            $error = false;
        }
    }
    $_SESSION["error"] = $error;
}
header("location:contact.php");
die;
?>