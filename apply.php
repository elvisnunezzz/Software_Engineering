<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply</title>

    <!-- Adding Bootsrap for better looks -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Adding Font from Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Barlow&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="apply.css">

</head>

<body>
<?php
//adding need info to get connected to database
$servername = "imc.kean.edu";
$username = "herrober";
$password = "1004626";
$dbname = "2020F_herrober";

$connection = mysqli_connect($servername, $username, $password, $dbname); 

// Connecting loging from project1.html,  Setting up information for the log in
$log = mysqli_real_escape_string($connection, $_POST['username']);
$pass = mysqli_real_escape_string($connection, $_POST['password']);

// Connecting SQL to check for authentication
$query = "SELECT * FROM 2020F_herrober.users WHERE emailInfo='$log' and passW= '$pass' ";

$result = mysqli_query($connection, $query);
$row = mysqli_fetch_array($result);
$count_row=mysqli_num_rows($result); 

// Login and Password correct
if (($row['emailInfo']== $log) && ($row['passW']== $pass)){
    $name = $row['fname'];
}
else{
    echo" <h1>wrong username or password! Click <a  href='login.html' role='butto'>here</a> to try again. </h1>";
    exit;
}

?>
    <!--Menu section  -->
    <div class="navBar">
        <nav class="navbar navbar-expand-md navbar-light lg-light ">
            <a class="navbar-brand" href="index.html">M&G SCHOOL BUS </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <a class="nav-link float-right" href="logout.php" role="button">Logout</a>
                </ul>
            </div>
        </nav>
    </div>
    <p id="sizeP"> Welcome, <?php echo"$name"; ?></p>
    <p id="sizeP">If you are ready to apply for the job make sure to fill the form below!</p>
    <br>

    <div class="jumbotron">
        <div class="container">

            <h1>Please fill out the following form to apply for the job!</h1>
            <br>
            <h3>Personal Info</h3>
            <!-- Inserting data into [insert_data.php] to save information into the database. -->
            <form method="POST" action="#" onSubmit="return check(this)">
                <div class="row">
                    <div class="col-sm-6">
                        <input type="text" class="form-control border-0" id="fname" name="fName" placeholder="First name:" required>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control border-0" id="lname" name="lName" placeholder="Last name:" required>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-sm-6">
                        <input type="text" class="form-control border-0" id="address" name="address" placeholder="Home Address:" required>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control border-0" id="city" name="city" placeholder="City/Town:" required>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-sm-3">
                        <input type="tel" class="form-control border-0" name="phone" id="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Telephone NO: 123-456-7890 " required>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <select class="form-control" id="oldEnough" required >
                                <option>Are you 21 or older?</option>
                                <option value="Y">Yes</option>
                                <option value="N">No</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <select class="form-control" id="ownLicense" required>
                                <option>Own a valid Driver License:</option>
                                <option value="Y">Yes</option>
                                <option value="N">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <select class="form-control" id="classType" required>
                                <option>License Class:</option>
                                <option value="C">Class C</option>
                                <option value="D">Class D</option>
                                <option value="N/A">N/A</option>
                            </select>
                        </div>
                    </div>
                </div>
                <br>
                <h3>Education</h3>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <select class="form-control" id="goSchool" required>
                                <option>Are you enrolled in education?</option>
                                <option value="Y">Yes</option>
                                <option value="N">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <select class="form-control" id="levelEduc" required>
                                <option>Highest level of education:</option>
                                <option value="HS/GED">High School / GED</option>
                                <option value="U">University / College</option>
                                <option value="N/A">N/A</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <select class="form-control" id="finishSch" required>
                                <option>Did you finish?</option>
                                <option value="Y">Yes</option>
                                <option value="N">No</option>
                                <option value="inProgress">In Progress</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <select class="form-control" id="curLevel" required>
                                <option>Current level?</option>
                                <option value="freshman">Freshman - 9</option>
                                <option value="sophomore">Sophomore - 10</option>
                                <option value="junior">Junior - 11</option>
                                <option value="Senior">Senior - 12</option>
                                <option value="University">University/College - 13+</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <input type="text" class="form-control border-0" name="fName" id="specTrain" placeholder="Any special training? Feel free to tell us!" maxlength="3000" required>
                    </div>

                   
                    
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-6">
                        <input type="text" class="form-control border-0" id="email" name="email" placeholder="Email:" required>
                    </div>


                <p>Please make sure to fill out all the sections in this form!</p>
                <button id="sign_in" type="submit" class="btn btn-outline-dark border-0 float-right">Submit</button>
            </form>
        </div>
    </div>
    <br>
    <br>
    <br>


    <!-- Js needed for the needed functionality -->
    <script src="createAccount.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>