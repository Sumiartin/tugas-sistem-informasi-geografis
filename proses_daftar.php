
<?php
include 'koneksi.php';
if (isset($_POST['btnDaftar'])){
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $query = mysqli_query($koneksi, "INSERT INTO user (username, password) VALUES ('$username', '$password')");

    if ($query) {
        echo "<script>
        alert('Daftar Berhasil');
        window.location.href='login.php';
        </script>";
    } else {
        echo "<script>
        alert('Daftar Gagal');
        window.location.href='daftar.php';
        </script>";
    }
    }
?>
