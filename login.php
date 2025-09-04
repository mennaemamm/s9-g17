<?php
session_start();
include "./connec.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email='$email' ";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['id'] = $user['id'];   
        $_SESSION['email'] = $user['email'];

        header("Location: edit.php");
        exit();
    } else {
        echo" البريد أو كلمة المرور غير صحيحة.";
    }
}
?>

<h2>Login</h2>
<form method="POST">
    <input type="email" name="email" placeholder="Enter email" required><br><br>
    <input type="password" name="password" placeholder="Enter password" required><br><br>
    <button type="submit">Login</button>
</form>

<a href="register.php">Don't have an account? Register</a>
