<?php 
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$email = $_SESSION['datos'][0];
		$mail = new PHPMailer(true);
		try {
		    //Server settings
		    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
		    $mail->isSMTP();                                      // Set mailer to use SMTP
		    $mail->Host = 'smtp.gmail.com';              // Specify main and backup SMTP servers
		    $mail->SMTPAuth = true;                               // Enable SMTP authentication
		    $mail->Username = 'cesarsamuelrohdz@gmail.com';                 // SMTP username
		    $mail->Password = 'rstw$am06798';                           // SMTP password
		    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		    $mail->Port = 587;                                    // TCP port to connect to

		    //Recipients
		    $mail->setFrom('cesarsamuelrohdz@gmail.com', 'Cotizacion Casa Baltazar');
		    $mail->addAddress($email, 'Cliente Cafe Cordoba');     // Add a recipient
		    //$mail->addAddress('ellen@example.com');               // Name is optional
		    //$mail->addReplyTo('info@example.com', 'Information');
		    //$mail->addCC('cc@example.com');
		    //$mail->addBCC('bcc@example.com');

		    //Attachments
		    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

		    //Content
		    $mail->isHTML(true);                                  // Set email format to HTML
		    $mail->Subject = 'Cotizacion Canastat';
		    $mail->Body    = 'En breve un ejecutivo se pondra en contacto <b>Gracias por su preferencia</b>';
		    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		    $mail->SMTPDebug = 0; //quitar mensajes de diagnostico
		    $mail->send();
		    session_destroy();
		    print "<script>window.location='../products.php';</script>";
		} catch (Exception $e) {
		    echo 'Message could not be sent. Mailer Error: ';
		}
		
?>