
<?php
include "sendMailCode.php";
include "db/config.php";
// Example usage:
$formData = $_POST; // Assuming form data is submitted via POST
$subject="Thank you for your interest in PMP Certification provided by Eureka Learnings";
$body = '
<table style="width:500px; border-collapse:collapse; font-family:Arial, sans-serif; margin:0 auto;">
    <tr>
        <td colspan="2" style="text-align:center; padding:10px;">
            <h1 style="margin:0;">Download Our Brochure</h1>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="padding:10px;">
            Dear '.$formData['name'].',
        </td>
    </tr>
    <tr>
        <td colspan="2" style="padding:10px;">
            We\'re thrilled to share our latest brochure with you! Click the button below to download and explore all the exciting details about our products/services.
        </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align:center; padding:10px;">
            <a href="https://eurekalearnings.in/courses/project-management/pmp/assets/eurekalearnings-project-management-professional-course-brochure.pdf" data-saferedirecturl="https://www.google.com/search?q=https://eurekalearnings.in/courses/project-management/pmp/assets/eurekalearnings-project-management-professional-course-brochure.pdf" style="background-color:#4CAF50; color:white; padding:12px 20px; text-align:center; text-decoration:none; display:inline-block; font-size:16px; margin:4px 2px; cursor:pointer; border-radius:10px;" target="_blank">Download Brochure</a>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="padding:10px;">
            Thank you for your interest in our offerings. If you have any questions or need further assistance, feel free to reach out to us.
        </td>
    </tr>
    <tr>
        <td colspan="2" style="padding:10px;">
            Best Regards,<br>[Your Name]
        </td>
    </tr>
</table>';

$stmt = $conn->prepare("INSERT INTO applicants (name, email, mobile) VALUES(?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $mobile);
$name = $formData['name'];
$email = $formData["email"];
$mobile = $formData["mobile"];

if ($stmt->execute()) {
    $adminEmailSent = sendEmailToAdmin($formData);
    $userEmailSent = sendThankYouEmailToUser($formData,$subject, $body);

    if ($adminEmailSent && $userEmailSent) {
        // $baseURL = getBaseUrl();
        // header("Location: https://eurekalearnings.in/courses/project-management/pmp/assets/eurekalearnings-project-management-professional-course-brochure.pdf");
        
        $redirectUrl = $_ENV['BROCHURE_URL'];

echo '<script type="text/javascript">window.location.href = "' . $redirectUrl . '";</script>';
    } else {
        echo 'Failed to send one or more emails.';
    }
} else {
    echo "record failed";
}


function getBaseUrl()
{
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'];
    return $protocol . '://' . $host;
}


$stmt->close();
$conn->close();
?>