<?php
session_start();
require "connection.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    if (empty($email) || empty($password)) {
    $_SESSION['login_error'] = "Email or Password are required";
    echo "<meta http-equiv='refresh' content='1;url=login.php'>";
    exit();
    }

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($connect, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['fullname'] = $user['fullname'];
        echo "<meta http-equiv='refresh' content='1;url=dashboard.php'>";
    }else{
        $_SESSION['login_error'] = "Invalid email or password";
        echo "<meta http-equiv='refresh' content='1;url=login.php'>";
    }
}
?>