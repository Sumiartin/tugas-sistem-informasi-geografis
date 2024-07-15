<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Utama</title>
  <!-- Leaflet CSS -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <!-- Bootstrap CSS -->
  <!-- Custom CSS -->
  <link href="assets/css/main.css" rel="stylesheet">
  <style>
    #map {
      height: 100vh;
    }
    .search-bar {
      margin-bottom: 1rem;
    }
  </style>
</head>
<body>

<?php
include "koneksi.php";
include 'lib/head.php';

session_start();
if(!isset($_SESSION['username'])){
  header('location:login.php');
  exit;
}
?>

<main id="main">

  <!-- Section for search bar and map -->
  <section class="mt-5">
    <div class="container">
      <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="post" action="#">
          <input class="form-control me-2" name="keyword" type="text" placeholder="Masukan kata kunci...">
          <button class="btn btn-info me-2" type="submit" name="cari" title="Search"><i class="bi bi-search"></i></button>
          <a href="index.php" class="btn btn-secondary" type="button"><i class="bi bi-arrow-clockwise"></i></a>
        </form>
      </div>
      <div id="map"></div>
    </div>
  </section>

</main><!-- End #main -->

<?php
include 'lib/footer.php';
?>

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
  var map = L.map('map').setView([-4.000000, 122.500000], 8);

  L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
  }).addTo(map);

  var bounds = L.latLngBounds(
    L.latLng(-6.5, 120.5), // Southwest corner
    L.latLng(-2.5, 124.5)  // Northeast corner
  );

  map.setMaxBounds(bounds);
  map.on('drag', function() {
    map.panInsideBounds(bounds, { animate: false });
  });

  var popup = L.popup();

  function onMapClick(e) {
    popup
      .setLatLng(e.latlng)
      .setContent("You clicked the map at " + e.latlng.toString())
      .openOn(map);
  }

  map.on('click', onMapClick);

  <?php 
  if(isset($_POST['cari'])){
    $keyword = $_POST['keyword'];
    $tampil = mysqli_query($koneksi, "SELECT * FROM lokasi WHERE nama LIKE '%$keyword%' OR kategori LIKE '%$keyword%'");
  }else{
    $tampil = mysqli_query($koneksi, "SELECT * FROM lokasi");
  }

  while($hasil = mysqli_fetch_array($tampil)){
  ?>
    var marker = L.marker([<?php echo $hasil['lat_lng'] ?>]).addTo(map);
    marker.bindPopup("<b><?php echo $hasil['nama'] ?></b><br><?php echo $hasil['lat_lng'] ?><br>Kategori: <?php echo $hasil['kategori'] ?><br>Keterangan: <?php echo $hasil['keterangan'] ?><br><img src='assets/img/<?php echo $hasil['gambar'] ?>' alt='' width='150px'>");
  <?php
  }
  ?>
</script>

</body>
</html>
