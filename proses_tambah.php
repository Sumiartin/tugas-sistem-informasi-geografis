
<?php
include 'koneksi.php';

    $latlng = $_POST['latlng'];
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $keterangan = $_POST['keterangan'];

    $gambar = $_FILES['gambar']['name'];
    $dir = "assets/img/";
    $dirfile = $_FILES['gambar']['tmp_name'];
    move_uploaded_file($dirfile,$dir.$gambar);

    $tambah = mysqli_query($koneksi, "INSERT INTO lokasi (lat_lng, nama, kategori, keterangan, gambar) VALUES('$latlng','$nama','$kategori','$keterangan','$gambar')");
    if ($tambah){
        echo "<script>
        alert('Tambah data berhasil');
        window.location.href='lokasi.php';
        </script>";
    }





?>
