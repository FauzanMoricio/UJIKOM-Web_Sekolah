<?php

include ('../../koneksi.php');
    
$id= $_POST['id'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$pesan = $_POST['pesan'];

// Check data kosong atau tidak
if(empty($_POST['nama']) || empty($_POST['email']) || empty($_POST['pesan'])) {
    echo "<script>
        alert('Semua data harus diisi');
        window.location='edit_kontak.php?id=$id';
        </script>";
} else {
    $query = "UPDATE kontak SET nama = '$nama', email = '$email', pesan = '$pesan' WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);

    if(!$result) {
        die("Query Error: " . mysqli_error($koneksi));
    } else {
        echo "<script>
            alert('Data Form Kontak Berhasil Diubah');
            window.location='kontak.php';
            </script>";
    }
} 
?>