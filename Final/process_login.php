<?php
/**
 * process_login.php - Login Processing Script
 * 
 * This script:
 * 1. Receives username and password from the login form
 * 2. Validates credentials against hardcoded values (for demo)
 * 3. Creates a PHP session and stores user data
 * 4. Redirects to dashboard.php if login is successful
 * 5. Redirects back to login.php if login fails
 * 
 * KEY CONCEPT: session_start() must be called BEFORE any output is sent
 */

// Start the session - this creates or resumes an existing session
// Sessions are stored on the server and identified by a session ID in cookies
session_start();

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Get username and password from form
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';
    
    // For demonstration: hardcoded credentials
    // In a real application, you would verify against a database
    $valid_username = 'admin';
    $valid_password = 'password123';
    
    // Verify credentials
    if ($username === $valid_username && $password === $valid_password) {
        
        // ✓ Login successful - Store user data in SESSION
        // $_SESSION is a superglobal array that persists across page requests
        // The session ID is maintained via a cookie on the client side
        
        $_SESSION['username'] = $username;
        $_SESSION['login_time'] = date('Y-m-d H:i:s'); // Store login timestamp
        $_SESSION['user_id'] = 1; // Example: you could store user ID from database
        
        // Log this activity (optional)
        error_log("User '$username' logged in successfully at " . $_SESSION['login_time']);
        
        // ✓ Redirect to dashboard page
        // Use header() to redirect BEFORE any output is sent
        header('Location: dashboard.php');
        exit(); // Stop further execution
        
    } else {
        
        // ✗ Login failed - Invalid credentials
        // Store error message in session and redirect back to login
        $_SESSION['login_error'] = 'Invalid username or password!';
        
        error_log("Failed login attempt - Username: $username");
        
        // Redirect back to login page
        header('Location: login.php');
        exit();
    }
    
} else {
    
    // If someone tries to access this page directly without POST
    header('Location: login.php');
    exit();
}

?>
