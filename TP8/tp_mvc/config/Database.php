<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "tp_mvc";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $db_name);

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
