
<?php
include 'koneksi.php';
if (isset($_POST['btnLogin'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");
    if (!$query) {
        die("Query gagal: " . mysqli_error($koneksi));
    }
    
    $data = mysqli_fetch_array($query);
    if ($data) {
        // Debugging: cek apakah password hash yang diambil benar
        // echo "Password Hash dari DB: " . $data['password'];

        if (password_verify($password, $data['password'])) {
            session_start();
            $_SESSION['username'] = $data['username'];
            header('Location: index.php');
        } else {
            header('Location: login.php?pesan=Password Salah');
        }
    } else {
        header('Location: login.php?pesan=Username Salah');
    }
}
?>
