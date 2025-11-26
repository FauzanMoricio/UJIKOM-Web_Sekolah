<?php
include ('../../koneksi.php');

// Memeriksa apakah data telah diisi
if(empty($_POST['nama']) || empty($_POST['email']) || empty($_POST['pesan'])) {
    echo "<script>
    alert('Semua data harus diisi.');window.location='../../views/index.php';
    </script>";
} else {
    
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $pesan = $_POST['pesan'];

    $query = "INSERT INTO kontak (nama, email, pesan) VALUES ('$nama', '$email', '$pesan')";
    $result = mysqli_query($koneksi, $query);

    if(!$result) {
        die("Query Error: " . mysqli_error($koneksi));
    } else {
        echo "<script>
        alert('Form Kontak Berhasil Dibuat');window.location='../../views/index.php';
        </script>";
    }
}
?>