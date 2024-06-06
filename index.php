<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try{
    $mail->isSMTP();
    $mail->Host     = 'sandbox.smtp.mailtrap.io';
    $mail->SMTPAuth = true;
    $mail->Username = '95e019df782f01';
    $mail->Password = 'ad99f76ac91324';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port  = 587;

    $mail->setFrom('bernass.correa@gmail.com');
    $mail->addAddress('bernass.correa@gmail.com');
    $mail->isHTML(true);
    $mail->Subject ='Notas do segundo trimestre';
    $mail->Body ='Parabéns! Você foi <b style="color:green">aprovado</b>';
    $mail->AltBody = 'Parabéns! Você foi aprovado';
    $mail->send();
    echo 'A mensagem foi enviada' . PHP_EOL;
}
catch (Exception $error){
    echo "A mensagem não pode ser enviada. Error: {$mail->ErrorInfo}";

}

?>
