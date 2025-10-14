<?php
$servername = "localhost";   // máy chủ MySQL
$username = "root";          // tài khoản mặc định của XAMPP/WAMP
$password = "";              // mật khẩu trống nếu bạn dùng mặc định
$dbname = "loginreg";        // tên database bạn đã tạo trong HeidiSQL

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
