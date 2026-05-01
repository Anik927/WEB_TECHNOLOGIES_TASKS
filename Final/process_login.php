<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    

    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';
    
    $valid_username = 'Anik';
    $valid_password = 'password123';
    
    
    if ($username === $valid_username && $password === $valid_password) {
            
        $_SESSION['username'] = $username;
        $_SESSION['login_time'] = date('Y-m-d H:i:s'); 
        $_SESSION['user_id'] = 1; 
        
        
        error_log("User '$username' logged in successfully at " . $_SESSION['login_time']);
        
        
        header('Location: dashboard.php');
        exit(); 
        
    } else {
        
        
        $_SESSION['login_error'] = 'Invalid username or password!';
        
        error_log("Failed login attempt - Username: $username");
                
        header('Location: login.php');
        exit();
    }
    
} else {
    
    header('Location: login.php');
    exit();
}

?>
