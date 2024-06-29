<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Make sure this path is correct

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'https://app.brevo.com/';
        $mail->SMTPAuth = true;
        $mail->Username = 'azalea.soapco2@gmail.com';
        $mail->Password = 'anyaella_73';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom($email, $name);
        $mail->addAddress('azalea.soapco2@gmail.com');

        $mail->isHTML(true);
        $mail->Subject = 'New Order';
        $mail->Body = "<b>New order from:</b> $name<br><b>Email:</b> $email";

        $mail->send();
        echo 'Order placed successfully';
    } catch (Exception $e) {
        echo "Error: {$mail->ErrorInfo}";
    }
}
?>
