<?php
require "database.php";

session_set_cookie_params(15 * 60, "/", "waph-team29.minifacebook.com", TRUE, TRUE);
session_start();

if (isset($_POST["username"]) && isset($_POST["password"])) {
    if (checklogin_mysql($_POST["username"], $_POST["password"])) {
        $_SESSION["authenticated"] = TRUE;
        $_SESSION["username"] = $_POST["username"];
        $_SESSION["browser"] = $_SERVER['HTTP_USER_AGENT'];
    } else {
        session_destroy();
        echo "<script>alert('Invalid username/password or Your account is disabled');window.location='form.php';</script>";
        die();
    }
}
if (!isset($_SESSION["authenticated"]) || $_SESSION["authenticated"] !== TRUE) {
    session_destroy();
    echo "<script>alert('You have not logged in. Please login first');</script>";
    header("Refresh:0; url=form.php");
    die();
}
if ($_SESSION["browser"] !== $_SERVER["HTTP_USER_AGENT"]) {
    session_destroy();
    echo "<script>alert('Session hijacking is detected!');</script>";
    header("Refresh:0; url=form.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HomePage</title>
    <link rel="stylesheet" href="https://waph-uc.github.io/style1.css">
    <link rel="stylesheet" href="style2.css">
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: lavender;
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
            width: calc(33.33% - 10px); /* Adjusting button width to fit side by side */
            padding: 10px;
            background-color: #5a4a73; /* Match button color with index.php */
            color: #fff;
            border: none;
            border-radius: 0;
            cursor: pointer;
            font-size: 14px;
            font-family: 'Times New Roman', Times, serif;
        }
        .button a {
            color: #fff;
            text-decoration: none;
        }
        .button:hover {
            background-color: #4c3f63; /* Match button hover color with index.php */
        }
    </style>
</head>
<body>
<div class="container wrapper">
    <div id="main">
        <h2>WAPH- TEAM 29</h2>
        <h2>TEAM 29 Project</h2>
        <center>
            <h2>Welcome <?php echo htmlentities($_SESSION['username']); ?>!</h2>
            <div class="button-container">
                <button class="button" type="submit"><a href="changepasswordform.php">Change password</a></button>
                <button class="button" type="submit" name="edit"><a href="profile.php">Edit profile</a></button>
                <button class="button" type="submit"><a href="logout.php">Logout</a></button>
                <button class="button" type="submit"><a href="viewposts.php">viewposts</a></button>
                <button class="button" type="submit"><a href="createPost.php">createPost</a></button>
                <button class="button" type="submit"><a href="dashboard.php"> Admin Panel</a></button>
            </div>
        </center>
    </div>
</div>
</body>
</html>
