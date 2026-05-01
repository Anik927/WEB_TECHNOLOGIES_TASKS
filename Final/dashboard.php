<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$username = $_SESSION['username'];
$login_time = isset($_SESSION['login_time']) ? $_SESSION['login_time'] : 'Unknown';
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 'N/A';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
        button, a.btn {
            padding: 8px 15px;
            margin: 10px 5px;
        }
        ul {
            display: inline-block;
            text-align: left;
        }
        pre {
            display: inline-block;
            text-align: left;
            background: #f0f0f0;
            padding: 15px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>Dashboard</h1>
    
    <nav>
        <a href="dashboard.php">Dashboard</a> |
        <a href="profile.php">Profile</a> |
        <a href="logout.php">Logout</a>
    </nav>

    <h2>Welcome, <?php echo htmlspecialchars($username); ?>!</h2>
    <p>You are successfully logged in</p>

    <h3>Your Session Information</h3>
    
    <p><strong>Username:</strong> <?php echo htmlspecialchars($username); ?></p>
    <p><strong>User ID:</strong> <?php echo htmlspecialchars($user_id); ?></p>
    <p><strong>Login Time:</strong> <?php echo htmlspecialchars($login_time); ?></p>


    <p>
        <button onclick="location.reload()">Refresh Page</button>
        <a href="logout.php" class="btn">Logout</a>
    </p>
</body>
</html>