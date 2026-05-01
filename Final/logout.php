<?php

session_start();

$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Unknown';

error_log("User '$username' logged out at " . date('Y-m-d H:i:s'));

session_destroy();

if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 3600, '/');
}

header('Location: login.php');
exit();

?>
