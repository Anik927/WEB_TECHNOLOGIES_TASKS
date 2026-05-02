<?php
session_start();
include "db.php";

$email_cookie = $_COOKIE['email'] ?? "";
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM registrations WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user["password"])) {

            $_SESSION["user"] = $user["full_name"];

            setcookie("email", $email, time() + (86400 * 7));
            setcookie("last_login", date("Y-m-d H:i:s"), time() + (86400 * 7));

            header("Location: dashboard.php");
            exit();
        } else {
            $message = "Wrong password!";
        }
    } else {
        $message = "User not found!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Login</h2>

    <?php if ($message != ""): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>

    <form method="POST">
        <input type="email" name="email" value="<?php echo $email_cookie; ?>" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Login</button>
    </form>

    <a href="register.php">Create account</a>
</div>

</body>
</html>