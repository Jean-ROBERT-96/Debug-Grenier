<?php
   namespace App\Utility;


   use PHPMailer\PHPMailer\PHPMailer;

   use PHPMailer\PHPMailer\SMTP;

   use PHPMailer\PHPMailer\Exception;


   define('__DIR', "C:/xampp/htdocs/videGrenier");
   require_once '../vendor/phpmailer/phpmailer/src/Exception.php';
   require_once  '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
   require_once '../vendor/phpmailer/phpmailer/src/SMTP.php';


   /**
    * Mail
    */
   class Mail{

    /**
     * sendMail
     * @param string $recv
     * @param string $content
     */
    static function sendMail($recv="videgrenierenligne@outlook.fr", $content="hello", $title="Vos produits ont intéressé quelqu'un !"){


   $mail = new PHPMailer(true);

   $mail->SMTPOptions = array(
    'tls' => array(
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => true
    )
    );
    $mail->CharSet = 'UTF-8';

   $mail->SMTPDebug = 0;

   $mail->isSMTP();

   $mail->Host = 'smtp.office365.com';

   $mail->SMTPAuth = true;

   $mail->Username = "videgrenierenligne@outlook.fr";

   $mail->Password = "8ZrFCDhDEiet46X";

   $mail->SMTPSecure = "tls";

   $mail->Port = 587;

   $mail->From = "videgrenierenligne@outlook.fr";

   $mail->FromName = "VideGrenier";


   $mail->addAddress($recv);

   $mail->isHTML(true);

   $mail->Subject = $title;

   $mail->Body =  $content;

   $mail->AltBody = "This is the plain text version of the email content";


   try {

       $mail->send();

       echo "Message has been sent successfully";

   } catch (Exception $e) {

       echo "Mailer Error: " . $mail->ErrorInfo;

   }
    }}
?>