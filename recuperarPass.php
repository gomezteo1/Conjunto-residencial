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
    $mail->Username   = 'zamasoft000@gmail.com';                     // SMTP username
    $mail->Password   = 'mas12/12';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;           
    $mail->CharSet = 'UTF-8';                                    // TCP port to connect to
    // TCP port to connect to

    //Recipients
    $mail->setFrom($usuario['correo_recuperacion'], 'Conjunto Residencial Juan Del Corral
    -Zamasoft');
    $mail->addAddress($usuario['correo_recuperacion']);     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('ccd@gmail.com');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    // Attachments
    ///$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('logo.png', 'new.png');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Recuperación De Clave';
    $mail->Body    = 
      '<body>
        <div class="row"> 
          <div class="col-2"></div>
          <div class="col-7" align="center"><h1 style="color:#000000; font-size:30px;">Conjunto Residencial Juan del Corral</h1></div>
          <div class="col-2" align="center"></div>
          <div class="col-1"></div>
        </div>
        <div class="container" align="center">
          <div class="card">
            <div class="card-body bg-light" align="left">
              <h3 style="color:#0097C2;font-size:20px">Hola,<strong>'.'  '.$usuario['nombres'].''.$usuario['apellidos'].''. '</strong></h3>
              <div>
                <br>
                <h3 style="color:#; font-size:20px"><strong>&nbsp;&nbsp; Contraseña restablecida </strong></h3>
                <br><br>
                <p></p>Ahora puede usar su nueva contraseña para iniciar sesión de nuevo
                en el sistema.</p>

                <p>Estimado:  '.''.$usuario['nombres'].''.$usuario['apellidos'].''.'<br> su contraseña es <strong>: '.''.$usuario['clave'].''.'</strong></p>

                <p>Recomendamos cambiar esta contraseña una vez inicie sesión, el cambio de contraseña 
                  lo encontrará en la sección de: <br><span style="color:#142F56"><strong>Ménu>Perfil>En la tabla>Cambiar contraseña</strong></span> </p>
              </div>
            </div>
          </div>
        </div>
      </body>';   
       
      
      $mail->send();
     
    echo 'Se a enviado un mensaje a tu correo con tu contraseña :D';
} catch (Exception $e) {
    echo "No se ha podido mandar el correo con la contraseña :( : {$mail->ErrorInfo}";
}
