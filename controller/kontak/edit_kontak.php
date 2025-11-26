<?php 
include ('../../koneksi.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM kontak WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die("Query Error: " . mysqli_errno($koneksi));
    }
    $data = mysqli_fetch_assoc($result);

    if (!$data) {
        echo "<script>alert('Data tidak ditemukan'); window.location='kontak.php';</script>";
    }

} else {
    echo "<script>alert('Masukkan ID yang ingin di Edit'); window.location='kontak.php';</script>";
}
?>


<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Kontak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1 class="text-center">Edit Kontak</h1>
    <form method="POST" action="proses_edit_kontak.php" enctype="multipart/form-data">
        <div class="card">
            <div class="card-header bg-light text-center">
                Form Edit Kontak
            </div>
            <div class="card-body">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($data['id']); ?>">

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" value="<?php echo htmlspecialchars($data['nama']); ?>" class="form-control" placeholder="Masukkan Nama" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" value="<?php echo htmlspecialchars($data['email']); ?>" class="form-control" placeholder="Masukkan Email" required>
                </div>

                <div class="mb-3">
                    <label for="pesan" class="form-label">Pesan</label>
                    <textarea id="pesan" name="pesan" class="form-control" placeholder="Masukkan Pesan" required><?php echo htmlspecialchars($data['pesan']); ?></textarea>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-warning">Ubah</button>
                    <a href="kontak.php" class="btn btn-info">Kembali</a>
                </div>
            </div>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
