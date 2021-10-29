<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once '/home/mehmetftp/PHPMailer/src/Exception.php';
require_once '/home/mehmetftp/PHPMailer/src/PHPMailer.php';
require_once '/home/mehmetftp/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($hedef, $konu, $içerik)
{
    $mail = new PHPMailer(true);

    try {
        //Server settings
        //$mail->SMTPDebug = 4;                      //Enable verbose debug output
        $mail->CharSet = "UTF*8";
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'secgetir00@gmail.com';                     //SMTP username
        $mail->Password   = 'ma592286';                               //SMTP password
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('secgetir00@gmail.com', 'Secgetir Admin');
        $mail->addAddress($hedef);     //Add a recipient
        $mail->isHTML(false);
        $mail->Subject = $konu;
        $mail->Body    = $içerik;
        $mail->send();
        return 'Message has been sent';
    } catch (Exception $e) {
        return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}