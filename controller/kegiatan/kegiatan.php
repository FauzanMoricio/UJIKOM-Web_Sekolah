<?php
include '../../koneksi.php';

// Ambil data kegiatan dari database
$query = "SELECT * FROM kegiatan";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Kegiatan</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-2 text-center mb-4">
    <h2>KEGIATAN</h2>
    
    <a href="tambah_kegiatan.php" class="btn btn-primary mb-3">Tambah Kegiatan</a>
    <a href="../../views/admin.php" class="btn btn-info mb-3">Kembali</a>

    <div class="row">
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <div class="col-md-3">
            <div class="card" style="width: 100%; height: 35rem;">
                <img src="../../assets/uploads/<?= $row['gambar']; ?>" class="card-img-top" alt="Gambar Kegiatan">
                <div class="card-body">
                    <h3 class="card-text"><?= $row['judul']; ?></h3>
                    <p><?= $row['deskripsi']; ?></p>
                    <a href="edit_kegiatan.php?id=<?= $row['id']; ?>" class="btn btn-warning">Edit</a>
                    <a href="hapus_kegiatan.php?id=<?= $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>

</body>
</html>
