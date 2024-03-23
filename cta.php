
<?php
include "sendMailCode.php";
include "db/config.php";
// Example usage:
$formData = $_POST; // Assuming form data is submitted via POST
$subject="Thank you for your message";
$body = "<h3>Dear $formData[name],</h3>";
$body .= "<p>Thank you for reaching out to us! We have received your message and will get back to you as soon as possible.</p>";
$body .= "<div>Best Regards,\n[Your Company Name]</div>";
$adminEmailSent = sendEmailToAdmin($formData);
$userEmailSent = sendThankYouEmailToUser($formData,$subject, $body);

if ($adminEmailSent && $userEmailSent) {
 echo "Thank You";
} else {
    echo 'Failed to send one or more emails.';
}

?>