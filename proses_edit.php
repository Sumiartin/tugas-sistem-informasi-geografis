
<?php
include 'koneksi.php';

    $latlng = $_POST['latlng'];
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $keterangan = $_POST['keterangan'];

    if($_FILES['gambar']['name'] != ""){
        $hapus_gambar = mysqli_query($koneksi, "SELECT gambar FROM lokasi WHERE id = '$_POST[id]'");
        $hasil = mysqli_fetch_array($hapus_gambar);
        unlink("assets/img/".$hasil['gambar']);

        $gambar = $_FILES['gambar']['name'];
        $dir = "assets/img/";
        $dirfile = $_FILES['gambar']['tmp_name'];
        move_uploaded_file($dirfile,$dir.$gambar);

        $edit = mysqli_query($koneksi, "UPDATE lokasi SET lat_lng='$latlng', nama='$nama', kategori='$kategori', keterangan='$keterangan', gambar='$gambar' WHERE id = '$_POST[id]'");

    }else{
        $edit = mysqli_query($koneksi, "UPDATE lokasi SET lat_lng='$latlng', nama='$nama', kategori='$kategori', keterangan='$keterangan' WHERE id = '$_POST[id]'");
    }

 if ($edit){
        echo "<script>
        alert('Edit data berhasil');
        window.location.href='lokasi.php';
        </script>";
    }





?>
