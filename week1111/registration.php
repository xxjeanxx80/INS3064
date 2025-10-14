<?php
session_start();
include("db_connect.php");

// Lấy dữ liệu từ form
$name = $_POST['user'];
$pass = $_POST['password'];
$student_name = $_POST['student_name'];
$dob = $_POST['dob'];
$country = $_POST['country'];

// Mã hóa mật khẩu bằng MD5
$hashed_pass = md5($pass);

// Kiểm tra trùng tên người dùng
$s = "SELECT * FROM userReg WHERE username='$name'";
$result = mysqli_query($conn, $s);
$num = mysqli_num_rows($result);

if ($num == 1) {
    echo "Username already exists!";
} else {
    // Thêm người dùng mới
    $reg = "INSERT INTO userReg (username, password, StudentName, Date_of_Birth, Country)
            VALUES ('$name', '$hashed_pass', '$student_name', '$dob', '$country')";
    if (mysqli_query($conn, $reg)) {
        echo "Registration successful";
        header("refresh:2;url=login.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
