<?php

session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - <?php echo htmlspecialchars($username); ?></title>
    <style>
        body {
            text-align: center;
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        nav {
            margin: 20px 0;
        }
        a {
            margin: 0 10px;
        }
        .content {
            display: inline-block;
            text-align: left;
            max-width: 600px;
        }        
    </style>
</head>
<body>
    <h1>My Profile</h1>
    
    <nav>
        <a href="dashboard.php">Dashboard</a> |
        <a href="profile.php">Profile</a> |
        <a href="logout.php">Logout</a>
    </nav>

    <div class="content">
        <h2>Your Profile Information</h2>

        <h3>Welcome to Your Profile</h3>

        <h3>Session Proof</h3>
        <p><strong>Your Username:</strong> <?php echo htmlspecialchars($username); ?></p>
        <p><strong>Login Time:</strong> <?php echo $_SESSION['login_time']; ?></p>
                
    </div>
</body>
</html>
