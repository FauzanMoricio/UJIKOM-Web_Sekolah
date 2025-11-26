<?php
include '../../koneksi.php';

$id = $_GET['id'];
$query = "SELECT * FROM kegiatan WHERE id='$id'";
$result = mysqli_query($koneksi, $query);
$row = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];

    // Cek apakah ada gambar baru
    if (!empty($_FILES['gambar']['name'])) {
        $gambar = $_FILES['gambar']['name'];
        $target = "../../assets/uploads/" . basename($gambar);
        move_uploaded_file($_FILES['gambar']['tmp_name'], $target);

        $query = "UPDATE kegiatan SET judul='$judul', deskripsi='$deskripsi', gambar='$gambar' WHERE id='$id'";
    } else {
        $query = "UPDATE kegiatan SET judul='$judul', deskripsi='$deskripsi' WHERE id='$id'";
    }

    mysqli_query($koneksi, $query);
    header("Location: kegiatan.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Edit Kegiatan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Edit Kegiatan</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Judul:</label>
            <input type="text" name="judul" class="form-control" value="<?= $row['judul']; ?>" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi:</label>
            <textarea name="deskripsi" class="form-control" required><?= $row['deskripsi']; ?></textarea>
        </div>
        <div class="mb-3">
            <label>Upload Gambar:</label>
            <input type="file" name="gambar" class="form-control">
            <p>Gambar saat ini: <?= $row['gambar']; ?></p>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>

</body>
</html>
