<?php
include '../../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    
    // Cek jika ada gambar baru
    if (!empty($_FILES['gambar']['name'])) {
        $gambar = $_FILES['gambar']['name'];
        $tmp_name = $_FILES['gambar']['tmp_name'];
        $folder = "../../assets/uploads/" . $gambar;
        move_uploaded_file($tmp_name, $folder);
        $query = "UPDATE berita SET judul='$judul', deskripsi='$deskripsi', gambar='$gambar' WHERE id=$id";
    } else {
        $query = "UPDATE berita SET judul='$judul', deskripsi='$deskripsi' WHERE id=$id";
    }

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Berita berhasil diperbarui'); window.location='berita.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui berita'); window.location='berita.php';</script>";
    }
}
?>
