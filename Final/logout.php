<?php
/**
 * logout.php - Logout Script
 * 
 * This script:
 * 1. Resumes the existing session
 * 2. Logs the user logout action
 * 3. Destroys all session data
 * 4. Redirects to the login page
 * 
 * KEY CONCEPT: session_destroy() removes all session data from the server.
 * After logout, the user cannot access protected pages without logging in again.
 */

// Resume the current session
session_start();

// Get username before destroying session (for logging)
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Unknown';

// Log the logout action
error_log("User '$username' logged out at " . date('Y-m-d H:i:s'));

// ✓ DESTROY THE SESSION
// This removes all session data stored on the server
// The session ID becomes invalid
session_destroy();

// ✓ Delete session cookie on the client side (optional but recommended)
// This clears the PHPSESSID cookie from the browser
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 3600, '/');
}

// ✓ Redirect to login page
header('Location: login.php');
exit();

?>
