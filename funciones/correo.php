<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/Exception.php';
require './PHPMailer/PHPMailer.php';
require './PHPMailer/SMTP.php';

function mandar_correo($destinatario, $asunto, $mensaje)
{
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.correo.com';                       //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'mi_correo@correo.com';                     //SMTP username
        $mail->Password   = 'contraseña1234';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $mail->CharSet = 'UTF-8';

        //Recipients
        $mail->setFrom('mi_correo@correo.com', 'Correo de prueba');
        $mail->addAddress($destinatario);     //Add a recipient
        /*
        $mail->addAddress('ellen@example.com');               //Name is optional
        $mail->addReplyTo('info@example.com', 'Information');
        $mail->addCC('cc@example.com');
        $mail->addBCC('bcc@example.com');
        
        //Attachments
        $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
        */
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $asunto;
        $mail->Body    = $mensaje;
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        $estado = 'El correo se ha enviado correctamente';
    } catch (Exception $e) {
        $estado = "¡Error! El mensaje no se pudo enviar: {$mail->ErrorInfo}";
    }
    return $estado;
}


