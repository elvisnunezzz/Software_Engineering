<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sent</title>

    <style>
        .imgIndex {
  padding-top: 100px;
  text-align: center;
}
    </style>
</head>


<body>
<?php
if (isset($_POST['Email'])) {

    $email_to = "herrober@kean.edu";
    $email_subject = "New Information Request";

    function problem($error)
    {
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br><br>";
        echo $error . "<br><br>";
        echo "Please go back and fix these errors.<br><br>";
        die();
    }

    if (
        !isset($_POST['Name']) ||
        !isset($_POST['Email']) ||
        !isset($_POST['Message'])
    ) {
        problem('We are sorry, but there appears to be a problem with the form you submitted.');
    }

    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $message = $_POST['Message'];

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    if (!preg_match($email_exp, $email)) {
        $error_message .= 'The Email address you entered does not appear to be valid.<br>';
    }

    $string_exp = "/^[A-Za-z .'-]+$/";

    if (!preg_match($string_exp, $name)) {
        $error_message .= 'The Name you entered does not appear to be valid.<br>';
    }

    if (strlen($message) < 2) {
        $error_message .= 'The Message you entered do not appear to be valid.<br>';
    }

    if (strlen($error_message) > 0) {
        problem($error_message);
    }

    $email_message = "This is a request for information.\n\n";

    function clean_string($string)
    {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }

    $email_message .= "Name: " . clean_string($name) . "\n";
    $email_message .= "Email: " . clean_string($email) . "\n";
    $email_message .= "Message: \n" . clean_string($message) . "\n";

    // create email headers
    $headers = 'From: ' . $email . "\r\n" .
    'Reply-To: ' . $email . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);

    echo "<h4> Thank you for contacting us <span style='color: red;' >$name</span>, We will be in touch with you very soon. </h4>";
    echo "<h5>We will be contacting you in the following email address: <span style='color: red;' >$email</span>";
    echo "<h5>Thank you!</h5>";
    echo "<br>";
    echo "<p>This page wil redirect you to the home page in a few second... </p>"
    ?>
 <?php
}
 ?>
    <div class='imgIndex'>
        <img src='school_bus.png'>
    </div>

  <script>
        var timer = setTimeout(function() {
            window.location='index.html'
        }, 16000);
    </script>
</body>
</html>
