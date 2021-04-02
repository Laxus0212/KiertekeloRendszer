<?php

//PHPMailer source: https://github.com/PHPMailer/PHPMailer/archive/master.zip
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include __DIR__ . "/PHPMailer/PHPMailer/src/Exception.php";

include __DIR__ . "/PHPMailer/PHPMailer/src/PHPMailer.php";

include __DIR__ . "/PHPMailer/PHPMailer/src/SMTP.php";
// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    //$mail->setLanguage('hu');
    //$mail->Encoding = 'base64';
    $mail->CharSet = 'UTF-8';
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth = true;                                   // Enable SMTP authentication
    $mail->Username = 'varadizsolt0212@gmail.com';                     // SMTP username
    $mail->Password = 'mosogatorongy0212';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    //Recipients
    $kuldoNeve = $_POST["kuldoNeve"];
    $kuldoEmail = $_POST["kuldoEmail"];
    $mail->setFrom($kuldoEmail, $kuldoNeve);
    $mail->addAddress('varadizsolt0212@gmail.com');               // Name is optional
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $_POST["targy"];
    $mail->Body = "<p>" . $_POST["uzenet"] . "</p>";
    //$mail->AltBody = '<p>This is the body in plain text for non-HTML mail clients</p>';
    $mail->send();
    echo '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Email:</strong> Üzenet elküldve!
          </div>';
} catch (Exception $e) {
    echo "Nem lehet elküldeni az üzenetet. Mailer Error: {$mail->ErrorInfo}";
}
?>


