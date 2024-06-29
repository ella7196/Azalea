<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



require 'vendor/autoload.php'; // Make sure this path is correct

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->SMTPDebug = 2; // Set to 2 for detailed debug output
    $mail->isSMTP();
    $mail->Host = 'https://app.brevo.com/'; // Replace with your SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'azalea.soapco2@gmail.com'; // Replace with your SMTP username
    $mail->Password = 'anyaella_73'; // Replace with your SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587; // Use 465 for SSL, 587 for TLS

    // Recipients
    $mail->setFrom('azalea.soapco2@gmail.com', 'Mailer'); // Replace with your email
    $mail->addAddress('azalea.soapco2@gmail.com', 'Recipient'); // Replace with recipient's email

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
