<?php
$servername = "localhost";
$username = "root";
$password = ""; // PASTIKAN INI SESUAI DENGAN PASSWORD MYSQL ANDA DI XAMPP
$dbname = "tarobill_db"; // PASTIKAN INI SESUAI DENGAN NAMA DATABASE ANDA

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
echo "Koneksi ke database berhasil!";

$conn->close();
?>