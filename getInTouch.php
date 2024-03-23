
<?php
session_start();
include "sendMailCode.php";
// Example usage:
$formData = $_POST; // Assuming form data is submitted via POST
$adminEmailSent = sendEmailToAdmin($formData);
//$userEmailSent = sendThankYouEmailToUser($_POST['email']);

if ($adminEmailSent) {
    $_SESSION['status']= "Request sent successfully";
    // $baseURL = getBaseUrl();
        // header("Location: https://eurekalearnings.in/courses/project-management/pmp/assets/eurekalearnings-project-management-professional-course-brochure.pdf");
        $redirectUrl = "http://localhost/pmp";
        echo '<script type="text/javascript">window.location.href = "' . $redirectUrl . '";</script>';
} else {
    echo 'Failed to send one or more emails.';
}



function getBaseUrl() {
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'];
    return $protocol . '://' . $host;
}
?>