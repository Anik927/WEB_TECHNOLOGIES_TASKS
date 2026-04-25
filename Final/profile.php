<?php
/**
 * profile.php - User Profile Page (Additional Protected Page)
 * 
 * This demonstrates that multiple pages can use the same session
 * to show how sessions maintain state across different pages
 */

session_start();

// Check if user is logged in
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
        pre {
            background: #f0f0f0;
            padding: 15px;
            border-radius: 5px;
            overflow-x: auto;
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
        <p>This page demonstrates that your session persists across multiple pages.</p>

        <h3>Session Proof</h3>
        <p><strong>Your Username:</strong> <?php echo htmlspecialchars($username); ?></p>
        <p><strong>Login Time:</strong> <?php echo $_SESSION['login_time']; ?></p>
        <p><strong>Session ID:</strong> <?php echo session_id(); ?></p>
        
        <pre>
// This page also calls session_start()
session_start();

// And can access the same session data
echo "Logged in as: " . $_SESSION['username'];
        </pre>

        <h3>How Sessions Work Across Pages</h3>
        <p><strong>Step 1:</strong> Login on login.php → session_start() created a session</p>
        <p><strong>Step 2:</strong> $_SESSION['username'] stored on the server</p>
        <p><strong>Step 3:</strong> PHPSESSID cookie sent to your browser</p>
        <p><strong>Step 4:</strong> Visit dashboard.php → session_start() resumes session</p>
        <p><strong>Step 5:</strong> Visit profile.php → session_start() resumes SAME session</p>
        <p><strong>Step 6:</strong> We can access $_SESSION['username'] here!</p>

        <h3>Key Takeaways</h3>
        <p>✓ Login once, stay logged in across all pages</p>
        <p>✓ Your data is stored securely on the server</p>
        <p>✓ Only the Session ID is stored in a cookie</p>
        <p>✓ Each page automatically resumes your session</p>
        <p>✓ Every page sends the same Session ID</p>

        <p style="margin-top: 30px;">
            <a href="dashboard.php">← Back to Dashboard</a> |
            <a href="logout.php">Logout</a>
        </p>
    </div>
</body>
</html>
