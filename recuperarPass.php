<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';


// Load Composer's autoloader

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 2;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    //$mail->Username   = 'trabajophp123456@gmail.com';                     // SMTP username
    $mail->Username   = 'juancamilo1143164715@gmail.com';                     // SMTP username
    $mail->Password   = '1143164715';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom($usuario['correo_recuperacion'], 'Zamasoft y asociados');
    $mail->addAddress($usuario['correo_recuperacion']);     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('jeysonspt1996@gmail.com');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    // Attachments
    ///$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Recuperacion de clave';
    $mail->Body    = '
    <body>
    <h1>Conjunto Residencial</h1>
    <h4>Juan del Corral</h4>
    




    <p>Estimado ' . $usuario['nombres'].'  '.$usuario['apellidos']  . '<br> su contraseña es <strong>:'.' '.$usuario['clave'] . '</strong></p>



    </body>';
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Se a enviado un mensaje a tu correo con tu contraseña :D';
} catch (Exception $e) {
    echo "No se ha podido mandar el correo con la contraseña :( : {$mail->ErrorInfo}";
}
