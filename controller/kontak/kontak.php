<?php include ('../../koneksi.php');?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Kontak</title>
<style>
</style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

  <!-- Main content -->
  <div class="container">
    <h1 class="text-center mt-3">Data Form Kontak</h1>

        <div class="card">
        <div class="card-header bg-light">
            Daftar Kontak
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Pesan</th>
                    <th scope="col">aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query = "SELECT * from kontak ORDER BY id ASC";
                    $result = mysqli_query($koneksi, $query);
                    
                    if(!$result) {
                        die("Query Error: " . mysqli_error($koneksi));
                    }
                    $no = 1;

                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['pesan']; ?></td>
                    <td>
                        <a href="edit_kontak.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a>
                        <a href="hapus_kontak.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm ('Yakin Anda Hapus?')">
                            Hapus
                        </a>
                    </td>
                </tr>
                <?php
                    $no++;
                    }
                ?>
 
            </tbody>
            </table>
            <a href="../../views/admin.php" type="button" class="btn btn-info">Kembali</a>
        </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>