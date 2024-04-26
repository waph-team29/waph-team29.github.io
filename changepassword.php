<?php
require "session_auth.php";
require "database.php";
$token = $_POST['nocsrftoken'];
if (!isset($token) or $token != $_SESSION['nocsrftoken']) {
    echo "<script>alert('CSRF Attack is detected!')</script>";
    die();
}
$username = $_SESSION["username"];
$password = $_REQUEST["newpassword"];
if (isset($username) and isset($password)) {
    echo "Debug> changepassword.php got username=$username;newpassword=$password";
    if (changepassword($username, $password)) {
        echo "<script>alert('Password has been changed!')</script>";
    } else {
        echo "<script>alert('Change password failed!')</script>";
    }
} else {
    echo "<script>alert('No username/password provided!')</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WAPH-TEAM 29 Project</title>
    <link rel="stylesheet" href="https://waph-uc.github.io/style4.css">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        /* Custom CSS for login page */
        body {
            background-color: #f0f0f0; /* Set background color */
            font-family: Arial, sans-serif; /* Set font family */
            margin: 0; /* Remove default margin */
            padding: 0; /* Remove default padding */
        }

        .container {
            max-width: 500px; /* Set maximum width of container */
            margin: 0 auto; /* Center align container */
            padding: 20px; /* Add some padding */
        }

        .form {
            background-color: #fff; /* Set background color of form */
            padding: 20px; /* Add padding to form */
            border-radius: 8px; /* Add border radius to form */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Add box shadow to form */
        }

        .text_field {
            width: 100%; /* Set width of text fields */
            margin-bottom: 20px; /* Add some space between text fields */
            padding: 10px; /* Add padding to text fields */
            border: 1px solid #ccc; /* Add border to text fields */
            border-radius: 4px; /* Add border radius to text fields */
            box-sizing: border-box; /* Ensure padding and border are included in width */
        }

        .button {
            width: 100%; /* Set width of button */
            padding: 10px; /* Add padding to button */
            background-color: #007bff; /* Set background color of button */
            color: #fff; /* Set text color of button */
            border: none; /* Remove border from button */
            border-radius: 4px; /* Add border radius to button */
            cursor: pointer; /* Change cursor to pointer on hover */
        }

        .button:hover {
            background-color: #0056b3; /* Change background color of button on hover */
        }

        #digit-clock {
            font-size: 18px; /* Set font size of clock */
            margin-bottom: 20px; /* Add some space below clock */
        }
    </style>
</head>
<body>
    <nav>
      <div class="nav-wrapper blue">
        <a href="index.php" class="brand-logo p2">Mini Facebook</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a href="index.php">Home</a></li>
          <li><a href="viewposts.php">Posts</a></li>
          <li><a href="profile.php">Profile</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </div>
    </nav>
    <div class="container wrapper">
        <div id="main">
            <h2>WAPH- TEAM 29</h2>
            <h2>TEAM 29 Project</h2>
            <center>
                <p>Your password has been changed! Click below to login again</p>
                <button class="button" type="submit"><a href="form.php">Login</a></button>
            </center>
        </div>
    </div>
</body>
</html>