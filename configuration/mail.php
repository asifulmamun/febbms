<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require_once $conifg . 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

function push_mail($sender_mail, $sender_name, $receiver_mail, $receiver_name, $mail_subject, $body, $success_message){
    // come from conn.php variable and mail variable from phpmailer object
    global $mail, $smtp_host, $smtp_host_port, $smtp_host_secuirity, $smtp_username, $smtp_password;
    
    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->SMTPDebug = false;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = $smtp_host;                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = $smtp_username;                     //SMTP username
        $mail->Password   = $smtp_password;                               //SMTP password
        // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
        $mail->SMTPSecure = $smtp_host_secuirity; //Enable implicit TLS encryption
        $mail->Port       =  $smtp_host_port; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom($sender_mail, $sender_name);
        $mail->addAddress($receiver_mail, $receiver_name); //Add a recipient

        //Content
        $mail->isHTML(true); //Set email format to HTML
        $mail->Subject = $mail_subject;
        $mail->Body    = $body;
        // $mail->AltBody = $body_non_html;

        $mail->send();
        echo $success_message;
    } catch (Exception $e) {
        // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        echo "Message could not be sent.";
    }

} // push_mail()