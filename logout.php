<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Logout</title>
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
      height: 90vh; /* Adjusted height */
    }
    #main {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      margin-top: 50px; /* Adjusted margin */
      text-align: center;
    }
    h1, h2 {
      color: #333; /* Text color */
    }
    p {
      color: #333;
    }
    .button {
      background-color: #5a4a73;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      padding: 10px 20px;
      margin-top: 20px; /* Adjusted margin */
      text-decoration: none;
    }
    .button:hover {
      background-color: #4c3f63;
    }
    .button a {
      color: #fff; /* Setting the color of text inside the button to white */
      text-decoration: none; /* Remove underline */
    }
    .logout-message {
      font-size: 20px; /* Increased font size */
      margin-bottom: 10px; /* Adjusted margin */
    }
  </style>
</head>
<body>
  <div class="container wrapper">
    <div id="main">
      <h1>WAPH- TEAM 29</h1>
      <h2>TEAM 29 Project</h2>
      <center style="border:none;"> 
        <p class="logout-message">You have successfully logged out! Bye! Bye! Visit again</p>
        <button class="button" type="submit"><a href="form.php">Login again</a></button>
      </center>
    </div>
  </div>
</body>
</html>
