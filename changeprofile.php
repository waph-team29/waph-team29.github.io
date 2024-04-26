<?php
require "session_auth.php";
require "database.php";

// Retrieve user input from the form
$Username = $_SESSION['username'];
$Fullname = $_REQUEST['fullname'];
$Email = $_REQUEST['additional_email'];
$Phone = $_REQUEST['phone'];

// Check if all required fields are provided
if (isset($Username) && isset($Fullname) && isset($Email) && isset($Phone)) {
    // Attempt to update the user's profile
    if (changeprofile($Username, $Fullname, $Email, $Phone)) {
        // If the profile update is successful, display a success message
        echo "<script>alert('Profile has been updated')</script>";
    } else {
        // If the profile update fails, display an error message
        echo "<script>alert('Update failed')</script>";    
    }
} else {
    // If any required field is missing, display an error message
    echo "<script>alert('Required fields are missing!')</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile Updated</title>
    <link rel="stylesheet" href="https://waph-uc.github.io/style1.css">
    <link rel="stylesheet" href="style2.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        #main {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            box-sizing: border-box;
            padding-top: 20px; /* Added top padding */
            padding-bottom: 20px; /* Added bottom padding */
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .button {
            width: 100%;
            padding: 10px;
            background-color: #5a4a73;
            color: #fff;
            border: none;
            border-radius: 0;
            cursor: pointer;
            font-size: 14px;
            font-family: Arial, sans-serif;
            text-decoration: none;
            display: block;
            text-align: center;
        }

        .button:hover {
            background-color: #4c3f63;
        }
    </style>
</head>
<body>
    <div class="container wrapper">
        <div class="wrapper">
            <div id="main">
                <h2>WAPH-TEAM 29</h2>
                <h2>Team Project</h2>
                <center>
                    <!-- Provide a message to inform the user that the profile has been updated -->
                    <p>The changes have been successfully saved. To log in again, click below.</p>
                    <button class="button" type="submit"><a href="form.php">Login</a></button>
                </center>
            </div>
        </div>
    </div>
</body>
</html>
