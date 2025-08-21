<?php
$servername = "localhost";
$username = "root"; // Sesuaikan dengan username MySQL Anda
$password = "";     // Sesuaikan dengan password MySQL Anda (biasanya kosong untuk XAMPP/Laragon default)
$dbname = "produk"; // Sesuaikan dengan nama database yang Anda buat

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}
?>