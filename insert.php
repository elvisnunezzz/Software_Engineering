<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creating Account</title>

    <!-- Adding Bootsrap for better looks -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Adding Font from Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Barlow&display=swap" rel="stylesheet">

<!-- Styling section -->
<style>
 body {
        padding-top: 25px;
        font-family: 'Barlow', sans-serif;
        text-align: center;
        text-transform: uppercase;
    }

    img {
			width: 300px;
			height: 225px;
			opacity: 0.8;
			padding-top: 35px;
			float: center;
		}

</style>
</head>
<body>
    <!-- Part of the program that takes info and sends it to database -->
    <?php

// require credentials from database
$servername = "imc.kean.edu";
$username = "herrober";
$password = "1004626";
$dbname = "2020F_herrober";

// creating connection to databaes
$conn = new mysqli($servername, $username, $password, $dbname);

// checking if conection to database was succesfull
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$fName = $_POST['fName'];
$lName = $_POST['lName'];
$phone = $_POST['phone'];
$userEmail = $_POST['user_email'];
$password = $_POST['password'];
$passWC = $_POST['passwordConf'];

//inserting values to database
$sql = "INSERT INTO users (fName, lName, phone, emailInfo, passW, passWc)
VALUES ('$fName', '$lName', '$phone', '$userEmail', '$password', '$passWC')";

// If input passed trough
if ($conn->query($sql) === true) {
    echo " <img src='school_bus.png'> ";
    echo "Thank you for becoming a member, now is time to login and apply for the job!";
    echo "<br>";
    echo "Click here to login and start the journey. <a href='login.html'> Here </a>";
}

// else provide details to the error.
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>

 <!-- Adding Javascript for actions -->
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>