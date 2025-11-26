<?php
include '../koneksi.php';

// Ambil data kegiatan dari database
$query = "SELECT * FROM kegiatan ORDER BY id DESC";
$result = mysqli_query($koneksi, $query);

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SDN COBLONG 4</title>
    <link rel="stylesheet" href="../assets/css/style.css">
  </head>
  <body>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- NAVBAR --> 
    <nav class="navbar navbar-expand-lg bg-light fixed-top">
        <div class="container">
        <a class="navbar-brand" href="#">SDN COBLONG 4</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-center" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#tentangkami">Tentang Kami</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#kegiatan">Kegiatan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#berita">Berita</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#kontak">Kontak</a>
            </li>
          </ul>
        </div>
        </div>
    </nav>
    <!-- NAVBAR END -->

    <!-- HOME -->
    <section id="home" class="home">
    <div class="container text-center">
        <h1>Selamat Datang di SDN COBLONG 4</h1>
        <p>Sekolah yang berkomitmen dalam pendidikan berkualitas dan pembentukan karakter unggul.</p>
        <a href="#tentangkami" class="btn btn-primary">Lihat Sekarang</a>
        <a href="#kontak" class="btn btn-success">Hubungi Kontak</a>
    </div>
    </section>
    <!-- HOME -->

    <!-- TENTANG KAMI -->
    <section id="tentangkami" class="tentangkami">
    <div class="container">
        <h2>TENTANG KAMI</h2>
        <p>SDN COBLONG 4 adalah sekolah dasar unggulan yang telah berdiri sejak tahun 1980. Kami berkomitmen memberikan pendidikan terbaik bagi anak-anak.</p>
        
        <div class="row mt-3">
        <div class="col-md-3">
            <div class="card" style="width: 100%; height: 15rem;">
                <div class="card-body">
                    <h5 class="card-title">Sejarah Sekolah</h5>
                    <p class="card-text">SDN Coblong 4 berdiri sejak tahun 1980 dengan visi menciptakan generasi yang unggul dalam akademik dan karakter.</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card" style="width: 100%; height: 15rem;">
                <div class="card-body">
                    <h5 class="card-title">Visi</h5>
                    <p class="card-text">Visi: Menjadi sekolah unggulan yang berkarakter. <br>
                   </p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card" style="width: 100%; height: 15rem;">
                <div class="card-body">
                    <h5 class="card-title"> Misi</h5>
                    <p class="card-text"> Misi: Membangun lingkungan belajar yang kreatif, inovatif, dan berbasis teknologi.</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card" style="width: 100%; height: 15rem;">
                <div class="card-body">
                    <h5 class="card-title">Fasilitas</h5>
                    <p class="card-text">Dilengkapi ruang kelas modern, laboratorium komputer, perpustakaan, dan lapangan olahraga untuk menunjang pembelajaran.</p>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- TENTANG KAMI -->

<!-- KEGIATAN -->
<section id="kegiatan" class="kegiatan">
    <div class="container">
        <h2>KEGIATAN</h2>

        <div class="row mt-3">
            <!-- Kegiatan dari database -->
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <div class="col-md-3">
                <div class="card" style="width: 100%; height: 28rem;">
                <img src="../assets/uploads/<?= $row['gambar']; ?>" class="card-img-top" alt="<?= $row['judul']; ?>">
                    <div class="card-body">
                        <h3 class="card-text"><?= $row['judul']; ?></h3>
                        <p><?= $row['deskripsi']; ?></p>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<!-- KEGIATAN -->

<!-- BERITA -->
<section id="berita" class="berita">
    <div class="container">
        <h2>Berita</h2>
        <p>Berita-Berita terkini Terkait SDN COBLONG 4 untuk Kegiatan Selanjutnya.</p>

        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
                <?php
                $query = "SELECT * FROM berita ORDER BY id DESC";
                $result = mysqli_query($koneksi, $query);
                $count = mysqli_num_rows($result);
                for ($i = 0; $i < $count; $i++) {
                    $active = ($i == 0) ? "active" : "";
                    echo "<button type='button' data-bs-target='#carouselExampleCaptions' data-bs-slide-to='$i' class='$active' aria-label='Slide " . ($i + 1) . "'></button>";
                }
                ?>
            </div>
            <div class="carousel-inner">
                <?php
                $first = true;
                while ($row = mysqli_fetch_assoc($result)) {
                    $active = $first ? "active" : "";
                    $first = false;
                    echo "<div class='carousel-item $active'>";
                    echo "<img src='../assets/uploads/{$row['gambar']}' class='d-block w-100' alt='{$row['judul']}'>";
                    echo "<div class='carousel-caption d-none d-md-block text-dark'>";
                    echo "<h5>{$row['judul']}</h5>";
                    echo "<p>{$row['deskripsi']}</p>";
                    echo "</div></div>";
                }
                ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>
<!-- BERITA -->


    <!-- KONTAK -->
    <section id="kontak" class="kontak"> 
    <div class="container">

        <div class="card text-center">
            <div class="card-header">
                <h2>Kontak</h2>
            </div>
            <div class="card-body">
            <form method="POST" action="../controller/kontak/form_kontak.php" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="mb-0">
                        <label class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama">
                    </div>
                    <div class="mb-0">
                        <label class="form-label">Email</label>
                        <input type="email" name="email"  class="form-control" placeholder="name@example.com">
                    </div>
                    <div class="mb-0">
                        <label class="form-label">Pesan</label>
                        <textarea name="pesan" class="form-control" placeholder="Masukkan Pesan"></textarea>
                    </div>

                </div>
                <div class="card-footer text-body-secondary">
                    <div class="mb-2">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="index.php" type="button" class="btn btn-info">Kembali</a>
                    </div>
                </div>
            </form>
        </div>      
    </div>
    </section>
    <!-- KONTAK -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
