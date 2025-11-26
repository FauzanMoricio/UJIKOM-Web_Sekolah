<?php
include '../../koneksi.php';

$id = $_GET['id'];

// Ambil nama file gambar sebelum menghapus data
$query_gambar = "SELECT gambar FROM berita WHERE id='$id'";
$result = mysqli_query($koneksi, $query_gambar);
$data = mysqli_fetch_assoc($result);

if ($data) {
    $gambar_path = "../../assets/uploads/" . $data['gambar'];

    // Hapus file gambar jika ada
    if (file_exists($gambar_path)) {
        unlink($gambar_path);
    }

    // Hapus data dari database
    $query = "DELETE FROM berita WHERE id='$id'";
    mysqli_query($koneksi, $query);
}

// Redirect
header("Location: berita.php");
exit();
?>
