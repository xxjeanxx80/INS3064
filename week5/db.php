<?php
// === db.php: Database connection settings ===
// 1) Create a MySQL database (e.g., 'loginreg').
// 2) Create a user with privileges on that DB, or reuse root for local dev.
// 3) Update the credentials below.
// 4) Import schema.sql into your DB once.

$DB_HOST = '127.0.0.1';   // e.g., 127.0.0.1 or localhost
$DB_USER = 'root';        // your MySQL username
$DB_PASS = '';            // your MySQL password
$DB_NAME = 'loginreg';    // your database name

$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if ($mysqli->connect_error) {
    die('Database connection failed: ' . $mysqli->connect_error);
}
$mysqli->set_charset('utf8mb4');
?>