<?php
// Kết nối MySQL
$link = mysqli_connect("localhost", "root", "", "login_demo");

// Kiểm tra kết nối
if (!$link) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

// Nếu muốn hiển thị xác nhận kết nối thành công (có thể bỏ)
# echo "Kết nối thành công!";
?>
