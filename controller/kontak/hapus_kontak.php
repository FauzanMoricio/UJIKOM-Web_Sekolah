<?php 
include ('../../koneksi.php');
$id = $_GET['id'];

$query = "DELETE FROM kontak where id = '$id'";
$result = mysqli_query($koneksi, $query);

if(!$result) {
    die("Query Error: " . mysqli_error($koneksi));
} else {
    echo "<script>
    alert('Data Kontak Berhasil DiHapus');
    window.location='kontak.php';
    </script>";
}

?>