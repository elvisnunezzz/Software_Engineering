<?php
if (isset($_POST['Email'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "kabalesk@gmail.com";
    $email_subject = "New form submissions";

    function problem($error)
    {
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br><br>";
        echo $error . "<br><br>";
        echo "Please go back and fix these errors.<br><br>";
        die();
    }

    // validation expected data exists
    if (
        !isset($_POST['fName']) ||
        !isset($_POST['lName']) ||
        !isset($_POST['Address']) ||
        !isset($_POST['City']) ||
        !isset($_POST['Phone']) ||
        !isset($_POST['AgeVerify']) ||
        !isset($_POST['LicenseVerify']) ||
        !isset($_POST['LicenseClass']) ||
        !isset($_POST['EducationBinary']) ||
        !isset($_POST['EducationLevel']) ||
        !isset($_POST['EducationFinished']) ||
        !isset($_POST['EducationLevel']) ||
        !isset($_POST['Email']) ||
 
    ) {
        problem('We are sorry, but there appears to be a problem with the form you submitted.');
    }

    $fname = $_POST['fName']; // required
    $lname = $_POST['lName']; // required
    $address = $_POST['Address']; // required
    $city = $_POST['City']; // required
    $phone = $_POST['Phone']; // required
    $age = $_POST['AgeVerify']) ||
    $license = $_POST['Drivers License']; // required
    $class = $_POST['LicenseClass']; // required
    $email = $_POST['Email']; // required
    $educationbinary = $_POST['EducationBinary']) || //required 
    $educationlevel = $_POST['EducationLevel']) || //required 


    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    if (!preg_match($email_exp, $email)) {
        $error_message .= 'The Email address you entered does not appear to be valid.<br>';
    }

    $string_exp = "/^[A-Za-z .'-]+$/";

    if (!preg_match($string_exp, $name)) {
        $error_message .= 'The Name you entered does not appear to be valid.<br>';
    }

    $phone_exp = "/^[\+0-9\-\(\)\s]*$/";

    if (!preg_match($phone_exp, $phone)) {
        $error_message .= 'The Name you entered does not appear to be valid.<br>';
    }
  

    if (strlen($address) < 2) {
        $error_message .= 'The Message you entered do not appear to be valid.<br>';
    }

    if (strlen($city) < 2) {
        $error_message .= 'The Message you entered do not appear to be valid.<br>';
    }

  

    if (strlen($error_message) > 0) {
        problem($error_message);
    }

    $email_message = "Form details below.\n\n";

    function clean_string($string)
    {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }

    $email_message .= "Name: " . clean_string($fname) . "\n";
    $email_message .= "Name: " . clean_string($lname) . "\n";
    $email_message .= "Name: " . clean_string($address) . "\n";
    $email_message .= "Name: " . clean_string($city) . "\n";
    $email_message .= "Name: " . clean_string($phone) . "\n";
    $email_message .= "Name: " . clean_string($age) . "\n";
    $email_message .= "Name: " . clean_string($license) . "\n";
    $email_message .= "Name: " . clean_string($class) . "\n";
    $email_message .= "Name: " . clean_string($educationbinary) . "\n";
    $email_message .= "Name: " . clean_string($educationlevel) . "\n";
    $email_message .= "Email: " . clean_string($email) . "\n";
    $email_message .= "Message: " . clean_string($message) . "\n";

    // create email headers
    $headers = 'From: ' . $email . "\r\n" .
        'Reply-To: ' . $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);
?>

    <!-- include your success message below -->

    Thank you for contacting us. We will be in touch with you very soon.

<?php
}
?>