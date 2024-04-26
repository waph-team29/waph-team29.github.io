<?php  
  require "database.php";
  $username = $_POST["username"];
  $password = $_POST["password"]; 
  $Fullname = $_POST["fullname"];
  $Email = $_POST["Email"];
  if (isset($username) && isset($password) && isset($Fullname) && isset($Email)){
    if(addnewuser($username,$password,$Fullname,$Email)){

    #echo "Debug> got username=$username;password=$password";

    echo "Registration succeed!";

    }else{
      echo "Registration failed!";
    }
  }else{
    echo "No username/password provided!";
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>WAPH - Individual Project</title>
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
    button {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      background-color: #5a4a73; /* Match the sign-in button color */
      color: #fff;
      border: none;
      border-radius: 0;
      cursor: pointer;
      font-size: 14px;
      font-family: 'Times New Roman', Times, serif;
    }
    button a {
      color: #fff;
      text-decoration: none;
    }
    button:hover {
      background-color: #4c3f63;
    }
    h2 {
      text-align: center;
      margin-bottom: 20px; /* Added margin */
    }
    center {
      border: none; /* Remove the border */
    }
  </style>
</head>
<body>
<div class="container wrapper">
  <div id="main">
    <h2>WAPH- TEAM 29</h2> <!-- Added h2 heading -->
    <h2>TEAM 29</h2> <!-- Added h2 heading -->
    <center> 
      <h2> Greetings!! <?php echo htmlentities($_POST['username']); ?> !</h2>
      <p> Use the below button to login now! </p>
      <button class="button" type="submit"><a href="form.php">Login</a></button>
    </center>
  </div>
</div>
</body>
</html>