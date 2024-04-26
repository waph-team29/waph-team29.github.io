<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Waph - TEAM PROJECT</title>
  <script type="text/javascript">
      function displayTime() {
        document.getElementById('digit-clock').innerHTML = "Current time:" + new Date();
      }
      setInterval(displayTime,500);
      
      function checkPasswordMatch() {
        var password = document.getElementById("password");
        var confirmPassword = document.getElementById("repassword");

        if (password.value !== confirmPassword.value) {
            confirmPassword.setCustomValidity("Passwords do not match");
        } else {
            confirmPassword.setCustomValidity('');
        }
      }
  </script>
  <link rel="stylesheet" href="https://waph-uc.github.io/style4.css">
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
    form {
      width: 100%;
    }
    input[type="email"],
    input[type="password"],
    input[type="text"] {
      width: calc(100% - 20px);
      padding: 10px;
      margin: 10px 0;
      border: 1px solid black;
      border-radius: 0;
      background-color: transparent;
      font-size: 12px;
      font-family: 'Times New Roman', Times, serif;
    }
    button {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      background-color: #5a4a73;
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
    hr {
      display: none;
    }
    .time-container {
      text-align: center;
    }
    .already-registered {
      text-align: center;
    }
    .visited-time {
      font-size: 16px; /* Increased font size */
    }
  </style>
</head>
<body>
  <div class="container wrapper">
    <div id="main">
      <div class="time-container">
        <h2>WAPH- TEAM 29<br>New user Registration form</h2>
        <div id="digit-clock"></div>  
        <span class="visited-time">Visited time: <?php echo date("Y-m-d h:i:sa"); ?></span><br><br>
      </div>
      <form action="addnewuser.php" method="POST" class="form login">
        <div style="text-align: left;">
          Full name:<br>
          <input type="text" name="fullname" required placeholder="Your full name"/><br>
          Email:<br>
          <input type="email" name="Email" required placeholder="email" onchange="this.setCustomValidity(this.validity.patternMismatch?this.title: '');"/><br>
          Username:<br>
          <input type="email" name="username" required title="Valid email address is required as username" placeholder="username in email" onchange="this.setCustomValidity(this.validity.patternMismatch?this.title: '');"/><br>
          Password:<br>
          <input type="password" id="password" name="password" required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$" placeholder="Your password" title="Password must have at least 8 characters with 1 special symbol !@#$%^&*, 1 number, 1 lowercase, and 1 UPPERCASE" onchange="checkPasswordMatch(); this.setCustomValidity(this.validity.patternMismatch?this.title:'');"/><br>
          Retype Password:<br>
          <input type="password" name="repassword" id="repassword" placeholder="Retype your password" required title="Passwords do not match" onchange="checkPasswordMatch();"/><br>
        </div>
        <button type="submit">Sign Up</button><br>
        <div class="already-registered">
          Already registered? <button><a href="https://waph-team29.minifacebook.com/form.php">Sign In</a></button>
        </div>
      </form> 
    </div>
  </div>
</body>
</html>
