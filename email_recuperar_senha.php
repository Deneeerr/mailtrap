<?php
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
 
require 'vendor/autoload.php';
 
$mail = new PHPMailer(true);
try {
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
    $mail->CharSet = "UTF-8";
    $mail->Subject = "Recuperação de senha";
    $recipientEmail = 'bernass.correa@gmail.com';
    $namePart = explode('@', $recipientEmail)[0];
    $temporaryCode = bin2hex(random_bytes(4));
    $emailBody = '<!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body {
                font-family: Arial, sans-serif;
                line-height: 1.6;
                color: #333;
                background-color: #f4f4f4;
                padding: 20px;
                margin: 0;
            }
            .container {
                max-width: 600px;
                margin: 0 auto;
                background-color: #ffffff;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
            .container h1 {
                color: #333;
            }
            .container p {
                margin: 1em 0;
            }
            .container .code {
                display: block;
                width: 100%;
                padding: 10px;
                background-color: #f4f4f4;
                border: 1px solid #ddd;
                border-radius: 5px;
                text-align: center;
                font-size: 1.2em;
                color: #333;
                margin: 20px 0;
            }
            .container a {
                color: #1a73e8;
                text-decoration: none;
            }
            .container a:hover {
                text-decoration: underline;
            }
            .footer {
                font-size: 0.9em;
                color: #777;
                margin-top: 20px;
            }
   
            @media (max-width: 600px) {
                body {
                    padding: 10px;
                }
                .container {
                    padding: 10px;
                }
            }
        </style>
    </head>
    <body>
        <div class="container">
            <table style="width: 100%;">
                <tr>
                    <td style="text-align: center;">
                        <h1>Recuperação de Senha</h1>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Olá <strong>[Nome do Usuário]</strong>,</p>
                        <p>Você solicitou a recuperação de senha para sua conta na <strong>Kash Company</strong>.</p>
                        <p>Para continuar o processo de recuperação de senha, use o código temporário abaixo:</p>
                        <div class="code"><strong>[Codigo Temporario]</strong></div>
                        <p>Este código é válido por apenas 30 minutos. Se você não solicitou a recuperação de senha, por favor, ignore este email ou entre em contato com o nosso suporte.</p>
                        <p>Para redefinir sua senha, clique no link abaixo e siga as instruções:</p>
                        <p><a href="[link_para_redefinicao_de_senha]">Redefinir minha senha</a></p>
                        <p>Se precisar de qualquer ajuda, não hesite em nos contatar. Nossa equipe de suporte está à disposição para responder suas perguntas e ajudá-lo(a) no que for necessário.</p>
                        <p>Atenciosamente,</p>
                        <p>Lucas Flores<br>
                           CEO<br>
                           Kash Company<br>
                           (47) 996963851</p>
                        <p class="footer">Se você não solicitou a recuperação de senha, por favor, ignore este email.</p>
                    </td>
                </tr>
            </table>
        </div>
    </body>
    </html>';
    $emailBody = str_replace('[Nome do Usuário]', $namePart, $emailBody);
    $emailBody = str_replace('[Codigo Temporario]', $temporaryCode, $emailBody);
    $mail->Body = $emailBody;
    $mail->AltBody = "Bem-vindo à Kash Company!
 
    Olá [Nome do Usuário],
   
    Seja bem-vindo(a) à Kash Company!
   
    Estamos muito felizes por você ter se juntado a nós. Nossa missão éte dar o melhor atendimento, e estamos aqui para garantir que você tenha a melhor experiência possível.
   
    Para começar, aqui estão alguns recursos que podem ser úteis:
   
    [Link para um tutorial ou guia de introdução]
    [Link para a página de FAQ]
    [Link para suporte ao cliente ou contato]
    Se precisar de qualquer ajuda, não hesite em nos contatar. Nossa equipe de suporte está à disposição para responder suas perguntas e ajudá-lo(a) no que for necessário.
   
    Agradecemos por escolher a Kash Company. Estamos ansiosos para ver você aproveitar ao máximo tudo o que oferecemos.
   
    Atenciosamente,
   
    Lucas Flores
    CEO
    Kash Company
    996963851
   
    ";
    $mail->send();
    echo 'a mensagem foi enviada' . PHP_EOL;
} catch (Exception $error) {
    $error->getTraceAsString();
    echo "A mensagem não pode ser enviada. Error: {$mail->ErrorInfo}";
}
 