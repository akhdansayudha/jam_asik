<?php
$host = "jamasik.mysql.database.azure.com";
$username = "admin123";
$password = "Ahdan123";
$database = "jam_asik";

// Inisialisasi koneksi untuk Azure MySQL
$conn = mysqli_init();

if (!$conn) {
    die('mysqli_init gagal');
}

mysqli_real_connect($conn, $host, $username, $password, $database);

// Cek koneksi
if (mysqli_connect_errno()) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Set charset ke utf8mb4
mysqli_set_charset($conn, "utf8mb4");
?>