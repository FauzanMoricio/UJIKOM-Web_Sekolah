<?php
include '../../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];

    // Validasi Gambar
    $allowed_extensions = ['jpg', 'jpeg', 'png'];
    $gambar = $_FILES['gambar']['name'];
    $tmp_name = $_FILES['gambar']['tmp_name'];

    // Ambil ekstensi file
    $file_extension = strtolower(pathinfo($gambar, PATHINFO_EXTENSION));

    if (!in_array($file_extension, $allowed_extensions)) {
        echo "<script>alert('Format file harus JPG, JPEG, atau PNG'); window.location='kegiatan.php';</script>";
        exit();
    }

    // Rename file untuk menghindari duplikasi
    $gambar_baru = time() . '_' . $gambar;
    $target = "../../assets/uploads/" . $gambar_baru;

    // Pindahkan file ke folder uploads
    if (move_uploaded_file($tmp_name, $target)) {
        // Simpan ke Database
        $query = "INSERT INTO kegiatan (judul, deskripsi, gambar) VALUES ('$judul', '$deskripsi', '$gambar_baru')";
        mysqli_query($koneksi, $query);
        header("Location: kegiatan.php");
    } else {
        echo "<script>alert('Gagal mengunggah gambar'); window.location='kegiatan.php';</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <title>Tambah Kegiatan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Tambah Kegiatan</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Judul:</label>
            <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi:</label>
            <textarea name="deskripsi" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label>Upload Gambar:</label>
            <input type="file" name="gambar" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>

</body>
</html>
