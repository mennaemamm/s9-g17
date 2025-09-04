<?php
session_start();
include "./connec.php";

if (!isset($_SESSION['id'])) {
    die(" يجب تسجيل الدخول أولاً.");
}

$id = $_SESSION['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "UPDATE users SET email='$email', password='$hashedPassword' WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        echo "تم تعديل البيانات.";
        $_SESSION['email'] = $email;
    } else {
        echo " خطأ: " . mysqli_error($conn);
    }
}
?>

<h2>Edit Profile</h2>
<form method="post">
    Email: <input type="email" name="email" value="<?= htmlspecialchars($_SESSION['email']) ?>" required><br><br>
    New Password: <input type="password" name="password" required><br><br>
    <button type="submit">Update</button>
</form>
