<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require 'src/Exception.php';
  require 'src/PHPMailer.php';
  require 'src/SMTP.php';
  $mail = new PHPMailer(true);
  try {
      $mail->SMTPDebug = 2;                                       // Enable verbose debug output
      $mail->isSMTP();                                            // Set mailer to use SMTP
      $mail->Host       = 'smtp.gmail.com';
      $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
      $mail->Username   = 'zamasoft000@gmail.com';       // SMTP username
      $mail->Password   = 'mas12/12';                           // SMTP password
      $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
      $mail->Port       = 587;
      $mail->CharSet = 'UTF-8';                                    // TCP port to connect to
      $mail->setFrom($usuario['correo_recuperacion'], 'Zamasoft');
      $mail->addAddress($usuario['correo']);     // Add a recipient
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = 'Su Nueva Clave Es: ';
      $mail->Body ='clave';
      $mail->send();
      echo 'El mensaje se envio correctamente';
  } 
  catch (Exception $e) {
      echo "Fatal error en el mensaje:", $mail->ErrorInfo;
  }