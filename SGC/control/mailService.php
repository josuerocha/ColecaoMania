<?php
require '../util/phpmailer/PHPMailerAutoload.php';
ini_set('default_charset', 'UTF-8');

function sendMail($to,$subject,$message){

// Configurando o servidor de SMTP
$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->isHTML(true);
$mail->isSMTP();

//$mail->isMail(true);
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';

$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

$mail->SMTPAuth = true;
$mail->Username = "colecaomaniasgc@gmail.com";
$mail->Password = "colecaomaniaihc";

// Email Sending Details
$mail->addAddress($to);
$mail->Subject = $subject;
$mail->msgHTML($message);
$mail->setFrom("colecaomaniasgc@gmail.com");

// Success or Failure
if (!$mail->send()) {
$error = "Mailer Error: " . $mail->ErrorInfo;
echo '<p id="para">'.$error.'</p>';
}
else {
echo '<p id="para">Message sent!</p>';
}

}
?>