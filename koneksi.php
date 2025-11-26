<?php 
$host = "localhost";
$username = "root";
$pass = "";
$db = "sekolah";
$koneksi = mysqli_connect ($host, $username, $pass, $db);

if (!$koneksi) {
        die("Koneksi database gagal" . mysqli_connect_error());
    }
?>