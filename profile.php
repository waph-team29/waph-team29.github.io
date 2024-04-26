<?php
    require "session_auth.php";
    require "database.php";

    $username = $_SESSION['username'];
    $userInfo = getUserInfo($username);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract data from the form
    $name = isset($_POST["fullname"]) ? $_POST["fullname"] : $userInfo['fullname'];
    $additionalEmail = isset($_POST["additional_email"]) ? $_POST["additional_email"] : $userInfo['additional_email'];
    $phone = isset($_POST["phone"]) ? $_POST["phone"] : $userInfo['phone'];
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Change Profile</title>
  <script type="text/javascript">
      function displayTime() {
        document.getElementById('digit-clock').innerHTML = "Current time:" + new Date();
      }
      setInterval(displayTime,500);
  </script>
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
      text-align: center;
    }
    h1, h2 {
      color: #333;
    }
    #digit-clock {
      margin-bottom: 20px;
    }
    .text_field, .email, .phone {
      width: calc(100% - 40px); /* Extend input fields */
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #333; /* Changed border color */
      border-radius: 0;
      text-align: left;
      display: inline-block;
    }
    .button {
      width: calc(100% - 40px); /* Extend button */
      padding: 10px;
      margin-top: 10px;
      background-color: #5a4a73;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    .button:hover {
      background-color: #4c3f63;
    }
    .left {
      text-align: left;
    }
  </style>
</head>
<body>
  <div class="container">
    <div id="main">
      <h1>WAPH- TEAM 29</h1>
      <h2>Change Profile</h2>
      <div id="digit-clock"></div>  
      <?php echo "Visited time: " . date("Y-m-d h:i:sa"); ?><br>
      <form action="changeprofile.php" method="POST" class="form login">
        <div class="left"> <!-- Added div with class "left" -->
          New Fullname: <br>
          <input type="text" class="text_field" name="fullname" placeholder="Enter your fullname" id="fullname" value="<?php echo isset($userInfo['fullname']) ? $userInfo['fullname'] : ''; ?>"/> <br>
          New Email: <br>
          <input type="text" class="email" name="additional_email" placeholder="Enter your email" id="additional_email" value="<?php echo isset($userInfo['additional_email']) ? $userInfo['additional_email'] : ''; ?>"/> <br>
          New Phone: <br>
          <input type="text" id="phone" name="phone" class="phone" placeholder="Enter your phone number" id="phone" value="<?php echo isset($userInfo['phone']) ? $userInfo['phone'] : ''; ?>"/> <br>
        </div>
        <button class="button" type="submit">Update Profile</button>
      </form>
    </div>
  </div>
</body>
</html>
