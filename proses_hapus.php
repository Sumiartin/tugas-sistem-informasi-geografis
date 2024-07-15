<?php
include 'koneksi.php';



$hapus_gambar = mysqli_query($koneksi, "SELECT gambar FROM lokasi WHERE id = '$_GET[id]'");
$hasil = mysqli_fetch_array($hapus_gambar);
unlink("assets/img/".$hasil['gambar']);

$hapus = mysqli_query($koneksi, "DELETE FROM lokasi WHERE id = '$_GET[id]'");

if ($hapus) {
    echo "<script>
    alert('Hapus Data Berhasil');
    window.location.href='lokasi.php';
    </script>";
}

?>
