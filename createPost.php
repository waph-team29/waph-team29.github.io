<?php
session_start();

// Check if user is authenticated
if (!isset($_SESSION["authenticated"]) || $_SESSION["authenticated"] !== true) {
    header("Location: form.php");
    exit;
}

// Include necessary files
require "database.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $title = $_POST["title"];
    $content = $_POST["content"];
    $posttime = date("Y-m-d H:i:s"); // Assuming posttime is a timestamp
    $owner = $_SESSION["username"]; // Get the username of the current user from session

    // Call createPost function to insert the post into the database
    if (createPost($title, $content, $posttime, $owner)) {
        // Post created successfully
        echo "Post created successfully!";
    } else {
        // Failed to create post
        echo "Failed to create post.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Post</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        /* Custom CSS for login page */
        body {
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
        }

        .form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .text_field {
            width: 100%;
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .button:hover {
            background-color: #0056b3;
        }

        #digit-clock {
            font-size: 18px;
            margin-bottom: 20px;
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
    <div class="container">
        <h1>Create Post</h1>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="title">Title:</label><br>
            <input type="text" id="title" name="title" required><br>
            <label for="content">Content:</label><br>
            <textarea id="content" name="content" rows="4" required></textarea><br>
            <button type="submit">Create Post</button>
        </form>
        <br>
        <a href="index.php">Back to Home</a> <!-- Link to go back to home page -->
    </div>
</body>
</html>
