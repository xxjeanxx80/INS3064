<?php
session_start();
include("db_connect.php");

// Lấy dữ liệu từ form đăng nhập
$name = $_POST['user'];
$pass = $_POST['password'];

// Mã hóa mật khẩu nhập vào để so sánh
$hashed_pass = md5($pass);

// Kiểm tra thông tin người dùng
$s = "SELECT * FROM userReg WHERE username='$name' AND password='$hashed_pass'";
$result = mysqli_query($conn, $s);
$num = mysqli_num_rows($result);

if ($num == 1) {
    $_SESSION['username'] = $name;
    header('location:home.php');
} else {
    echo "Invalid username or password";
    header("refresh:2;url=login.php");
}

mysqli_close($conn);
?>
