<?php
include '../../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];

    // Upload gambar
    $gambar = $_FILES['gambar']['name'];
    $tmp_name = $_FILES['gambar']['tmp_name'];
    $folder = "../../assets/uploads/" . $gambar;
    
    // Validasi ekstensi file
    $allowed_extensions = ['jpg', 'jpeg', 'png'];
    $file_extension = strtolower(pathinfo($gambar, PATHINFO_EXTENSION));

    if (in_array($file_extension, $allowed_extensions)) {
        if (move_uploaded_file($tmp_name, $folder)) {
            $query = "INSERT INTO berita (judul, deskripsi, gambar) VALUES ('$judul', '$deskripsi', '$gambar')";
            if (mysqli_query($koneksi, $query)) {
                echo "<script>alert('Berita berhasil ditambahkan'); window.location='berita.php';</script>";
            } else {
                echo "<script>alert('Gagal menambahkan berita'); window.location='berita.php';</script>";
            }
        } else {
            echo "<script>alert('Gagal mengupload gambar'); window.location='berita.php';</script>";
        }
    } else {
        echo "<script>alert('Format gambar tidak valid! Hanya JPG, JPEG, dan PNG yang diperbolehkan.'); window.location='berita.php';</script>";
    }
}
?>

