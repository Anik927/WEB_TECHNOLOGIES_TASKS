<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}

$user = htmlspecialchars($_SESSION["user"]); // prevent XSS
$last_login = $_COOKIE["last_login"] ?? null;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="dashboard">
    <h2>Welcome, <?php echo $user; ?>!</h2>

    <?php if ($last_login): ?>
        <p>Last login: <?php echo $last_login; ?></p>
    <?php endif; ?>

    <a class="logout-btn" href="logout.php">Logout</a>
</div>

</body>
</html>