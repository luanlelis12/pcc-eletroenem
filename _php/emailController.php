<?php

require_once 'vendor/autoload.php';
require_once 'constantes.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
  ->setUsername(EMAIL)
  ->setPassword(PASSWORD);
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

function sendVerificationEmail($userEmail, $token)
{
    global $mailer;

    $body = '<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Verificar email</title>
</head>
<body>
    <div class="wrapper">
        <p>
            Obrigado por se cadastrar no nosso site. Por favor, clique no link abaixo para verificar o seu email.
        </p>
        <a href="http://localhost/pcc/index.php?token=' . $token . '">
            Verifique seu endereço de email
        </a>
    </div>    
</body>
</html>';

    // Create a message
    $message = (new Swift_Message('Verifique seu email'))
        ->setFrom(EMAIL)
        ->setTo($userEmail)
        ->setBody($body, 'text/html');

    // Send the message
    $result = $mailer->send($message);
}