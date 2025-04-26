<?php
$conn = new mysqli("localhost", "root", "", "kost");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>