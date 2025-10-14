<?php
session_start();
require_once __DIR__ . "/db.php";  // Dùng $mysqli từ db.php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($mysqli, $_POST['user']);
    $pass = mysqli_real_escape_string($mysqli, $_POST['password']);

    // Query sửa AND
    $s = "SELECT * FROM userReg WHERE name='$name' AND password='$pass'";
    $result = mysqli_query($mysqli, $s);
    $num = mysqli_num_rows($result);

    if ($num == 1) {
        $_SESSION['username'] = $name;
        header('location:home.php');
        exit();
    } else {
        header('location:login.php?error=invalid');
        exit();
    }
} else {
    header('location:login.php');
    exit();
}
?>