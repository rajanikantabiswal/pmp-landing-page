
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Include PHPMailer autoload.php file

function sendEmail($recipientEmail, $subject, $body) {
    try {
        // Initialize PHPMailer
        $mail = new PHPMailer(true);

        // Server settings
        $mail->isSMTP(); // Send using SMTP
        $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
        $mail->SMTPAuth = true; // Enable SMTP authentication
        $mail->Username = 'rajanikantabiswal15@gmail.com'; // SMTP username
        $mail->Password = 'ocio hgev ihfd wxpc'; // SMTP password
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port = 587; // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        // Recipients
        $mail->setFrom('rajanikantabiswal15@gmail.com', 'Rajanikanta Biswal');
        $mail->addAddress($recipientEmail); // Add recipient email address

        // Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body = $body;

        // Send email
        $mail->send();
        return true; // Email sent successfully
    } catch (Exception $e) {
        return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

// Function to send email to admin
function sendEmailToAdmin($formData) {
    $subject = 'New enquiry for PMP Certification';
    $body = '<h3>Form Data:</h3><ul>';
    foreach ($formData as $key => $value) {
        $body .= '<li><strong>' . htmlspecialchars($key) . ':</strong> ' . htmlspecialchars($value) . '</li>';
    }
    $body .= '</ul>';

    $adminEmail = 'rk@jetsmartis.com'; // Replace with admin's email address
    return sendEmail($adminEmail, $subject, $body);
}

// Function to send thank you email to user
function sendThankYouEmailToUser($formData, $subject, $body) {
    $userEmail=$formData['email'];

    return sendEmail($userEmail, $subject, $body);
}

?>
