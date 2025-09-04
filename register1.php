<?php
session_start();
include "./connec.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO users (email, password) VALUES ('$email', '$hashedPassword')";
    if (mysqli_query($conn, $query)) {
        echo "Account created!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<h2>Register</h2>
<form method="POST">
    <input type="email" name="email" placeholder="Enter email" required><br><br>
    <input type="password" name="password" placeholder="Enter password" required><br><br>
    <button type="submit">Sign Up</button>
</form>

<a href="login.php">Already have an account? Login</a>
