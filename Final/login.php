<?php
// login.php - Login Page for Session Demonstration
// This page displays a login form where users can enter their credentials
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Session Demonstration</title>
    <style>
        body {
            text-align: center;
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        form {
            display: inline-block;
            text-align: left;
            margin: 20px;
        }
        input {
            padding: 8px;
            margin: 10px 0;
            width: 250px;
        }
        button {
            padding: 8px 20px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h1>Login</h1>
    <p>Session Demonstration in PHP</p>

    <form method="POST" action="process_login.php">
        <div>
            <label for="username">Username:</label>
            <input 
                type="text" 
                id="username" 
                name="username" 
                placeholder="Enter your username" 
                required
            >
        </div>

        <div>
            <label for="password">Password:</label>
            <input 
                type="password" 
                id="password" 
                name="password" 
                placeholder="Enter your password" 
                required
            >
        </div>

        <button type="submit">Login</button>
    </form>

    <h3>Demo Credentials:</h3>
    <p>
        Username: <strong>admin</strong><br>
        Password: <strong>password123</strong><br><br>
        (For demonstration purposes - sessions store this login state)
    </p>
</body>
</html>