<?php
session_start();

// Check if user is authenticated
if (!isset($_SESSION["authenticated"]) || $_SESSION["authenticated"] !== true) {
    header("Location: form.php");
    exit;
}

// Include necessary files
require "database.php";

// Fetch username of the current user
$username = $_SESSION['username'];
$password = $_SESSION['password'];

// Fetch posts for the current user
$superusers = getAllSuperusers();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <!-- Include Bootstrap CSS or any other styling framework -->
</head>
<body>
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        /* Custom CSS for dashboard */
        body {
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f2f2f2;
        }

        button {
            padding: 8px 16px;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
            cursor: pointer;
        }

        button:hover {
            background-color: #1877f2;
            color: #ffffff;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Dashboard</h1>
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
    <table>
        <thead>
            <tr>
                <th>User ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($superusers as $user): ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['username']; ?></td>
                    <td><?php echo $user['Email']; ?></td>
                    <td><?php echo $user['isdisabled'] ? 'Disabled' : 'Enabled'; ?></td>
                    <td>
                        <?php if ($user['isdisabled']): ?>
                            <button onclick="enable-user.php">Enable</button>
                        <?php else: ?>
                            <button onclick="disable-user.php">Disable</button>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script>
        function enableUser(userId) {
            var token = "<?php echo $_SESSION['nocsrftoken']; ?>";
            var data = {
                userId: userId,
                nocsrftoken: token
            };

            // AJAX request to enable-user.php
            $.post('enable-user.php', data, function(response) {
                if (response.success) {
                    // Reload the page or update the user status dynamically
                    location.reload();
                } else {
                    alert("Error: " + response.errorMessage);
                }
            }, 'json');
        }

        function disableUser(userId) {
            var token = "<?php echo $_SESSION['nocsrftoken']; ?>";
            var data = {
                userId: userId,
                nocsrftoken: token
            };

            // AJAX request to disable-user.php
            $.post('disable-user.php', data, function(response) {
                if (response.success) {
                    // Reload the page or update the user status dynamically
                    location.reload();
                } else {
                    alert("Error: " + response.errorMessage);
                }
            }, 'json');
        }
        <a href="index.php">Back to Home</a>
    </script>
</body>
</html>