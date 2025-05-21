<?php
session_start();
require 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $fullname = htmlspecialchars($_POST['fullname']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $password_confirm = htmlspecialchars($_POST['password_confirm']);

    $error = [];


    if (empty($fullname)) {
        $error['fullname'] = "Fullname is required";
    }

    if (empty($email)) {
        $error['email'] = "Email is required";
    }

    if (empty($password)) {
        $error['password'] = "Password is required";
    }

    if (empty($password_confirm)) {
        $error['password_confirm'] = "Confirm password is required";
    }

    if ($password !== $password_confirm) {
        $error['password_confirm'] = "Password and Confirm Password do not match";
    }

    if (!empty($error)) {
        $_SESSION['error'] = $error;
        $_SESSION['old'] = [
            'fullname' => $fullname,
            'email' => $email,
        ];
        echo "<meta http-equiv='refresh' content='1;url=index.php'>";
        exit();
    }

    if (empty($error)) {

        $hash_password = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users(fullname, email, password) VALUES ('$fullname','$email','$hash_password')";

        if (mysqli_query($connect, $query)) {
            echo "<meta http-equiv='refresh' content='1;url=index.php'>";
        }else {
            echo "Error: " . mysqli_error($connect);
        }
    }

}