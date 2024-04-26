<?php
session_start();
if (!isset($_SESSION["authenticated"]) || $_SESSION["authenticated"] !== true) {
    header("Location: form.php");
    exit;
}

require "database.php";

// Get postID from URL
if (!isset($_GET['postID'])) {
    header("Location: viewposts.php");
    exit;
}

$postID = $_GET['postID'];

// Fetch post details
$post = getPostByID($postID);

// Check if post owner matches logged-in user
if ($_SESSION['username'] !== $post['owner']) {
    header("Location: viewposts.php");
    exit;
}

// Update post if form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_post"])) {
    $title = $_POST["title"];
    $content = $_POST["content"];
    updatePost($postID, $title, $content);
    header("Location: viewposts.php");
    exit;
}

// Delete post if form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_post"])) {
    deletePost($postID);
    header("Location: viewposts.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Post</title>
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
        <h1>Edit Post</h1>
        <form method="POST">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?php echo $post['title']; ?>" required>

            <label for="content">Content:</label>
            <textarea id="content" name="content" required><?php echo $post['content']; ?></textarea>

            <button type="submit" name="update_post" class="button">Update Post</button>
            <button type="submit" name="delete_post" class="button">Delete Post</button>
        </form>
    </div>
</body>
</html>
