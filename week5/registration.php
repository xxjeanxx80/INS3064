<?php
session_start();
require_once __DIR__ . "/db.php";  // Dùng kết nối từ db.php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($mysqli, $_POST['user']);
    $pass = mysqli_real_escape_string($mysqli, $_POST['password']);

    // Kiểm tra user tồn tại
    $s = "SELECT * FROM userReg WHERE name='$name'";
    $result = mysqli_query($mysqli, $s);
    $num = mysqli_num_rows($result);

    if ($num == 1) {
        // Username exists, redirect with error
        header('location:login.php?error=exists');
        exit();
    } else {
        // Insert new user
        $reg = "INSERT INTO userReg (name, password) VALUES ('$name', '$pass')";  // Nên hash pass
        if (mysqli_query($mysqli, $reg)) {
            header('location:login.php?reg=success');
            exit();
        } else {
            die('Error: ' . mysqli_error($mysqli));
        }
    }
} else {
    // Không phải POST, redirect về login
    header('location:login.php');
    exit();
}
?>