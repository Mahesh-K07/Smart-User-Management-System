<?php
include("database.php");
session_start();
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = trim($_POST["fullname"]);
    $email = trim($_POST["email"]);
    $username = trim($_POST["username"]);
    $password = $_POST["password"];
    $confirm = $_POST["confirm"];

    if (empty($fullname) || empty($email) || empty($username) || empty($password) || empty($confirm)) {
        $message = "<p class='error'>All fields are required.</p>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "<p class='error'>Invalid email format.</p>";
    } elseif ($password !== $confirm) {
        $message = "<p class='error'>Passwords do not match.</p>";
    } else {
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $checkUser = mysqli_query($conn, "SELECT * FROM user WHERE email='$email' OR username='$username'");
        if (mysqli_num_rows($checkUser) > 0) {
            $message = "<p class='error'>Email or Username already exists.</p>";
        } else {
            $sql = "INSERT INTO user (fullname, email, username, password)
                    VALUES ('$fullname', '$email', '$username', '$hashed')";
            if (mysqli_query($conn, $sql)) {
                header("Location: success.php");
                exit;
            } else {
                $message = "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="form-container">
    <h2>Create an Account</h2>
    <?php echo $message; ?>
    <form method="POST">
        <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="fullname" placeholder="Enter your full name" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" placeholder="Enter your email" required>
        </div>
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" placeholder="Choose a username" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Enter password" required>
        </div>
        <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" name="confirm" placeholder="Re-enter password" required>
        </div>
        <button type="submit" class="btn">Register</button>
        <p class="note">Already have an account? <a href="login.php">Login here</a></p>
    </form>
</div>
</body>
</html>
