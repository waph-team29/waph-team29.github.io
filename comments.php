<?php
// Include necessary files
require "database.php";

// Check if the post ID is provided
if (!isset($_GET['postID'])) {
    // Redirect to view posts page if post ID is not provided
    header("Location: viewposts.php");
    exit;
}

// Fetch post details based on the provided post ID
$postID = $_GET['postID'];
$post = getPostByID($postID);

// Check if the post exists
if (!$post) {
    // Redirect to view posts page if post does not exist
    header("Location: viewposts.php");
    exit;
}

// Initialize error variable
$error = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract data from the form
    $comment = $_POST["comment"];

    // Add the comment to the database
    if (Comments($postID, $comment)) {
        // Redirect to view posts page after successful comment addition
        header("Location: viewposts.php?comment_added=true&postID=$postID");
        exit;
    } else {
        // Handle comment addition failure
        $error = "Failed to add comment.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Comment</title>
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

        .error {
            color: red;
        }

        .success {
            color: green;
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
        <h1>Add Comment</h1>
        <?php if ($error): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <?php if (isset($_GET['comment_added']) && $_GET['comment_added'] === "true"): ?>
            <p class="success">Comment added successfully!</p>
        <?php endif; ?>
        <form action="" method="POST">
            <label for="comments">Comment:</label>
            <textarea id="comments" name="comment" required></textarea>
            <button type="submit" class="button">Add Comment</button>
        </form>
        
        <!-- Display comments -->
        <?php if (!empty($comments)): ?>
            <h2>Comments</h2>
            <ul>
                <?php foreach ($comments as $comment): ?>
                    <li><?php echo htmlspecialchars($comment['comment']); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</body>
</html>