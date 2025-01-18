<?php
$host = "localhost"; // Nama host atau IP server database
$username = "root"; // Username MySQL (default root)
$password = ""; // Password MySQL (biarkan kosong jika default tanpa password)
$dbname = "museum"; // Nama database yang kamu gunakan

// Membuat koneksi ke MySQL
$conn = new mysqli($host, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
} else {
}
