<?php
session_start();

// Kết nối cơ sở dữ liệu
$con = mysqli_connect("localhost", "root", "", "mini_project");
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Đường dẫn thực tế trên máy (server path)
define('SERVER_PATH', $_SERVER['DOCUMENT_ROOT'] . '/ins3064/Book-rental/');

// Đường dẫn truy cập website (site path)
const SITE_PATH = 'http://localhost/ins3064/Book-rental/';

// Đường dẫn thư mục chứa ảnh sách
const BOOK_IMAGE_SERVER_PATH = SERVER_PATH . 'Img/books/'; 
const BOOK_IMAGE_SITE_PATH   = SITE_PATH   . 'Img/books/';
?>
