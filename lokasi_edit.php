<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Lokasi</title>
  <!-- Leaflet CSS -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <!-- Bootstrap CSS -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="assets/css/main.css" rel="stylesheet">
  <style>
    #map {
      height: 100vh;
    }
  </style>
</head>
<body>

<?php
include "koneksi.php";
include 'lib/head.php';

// Fetch data from the database to fill in the form
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM lokasi WHERE id = $id");
$data = mysqli_fetch_array($query);

$latlng = $data['lat_lng'];
list($lat, $lng) = explode(', ', $latlng);
$nama = $data['nama'];
$kategori = $data['kategori'];
$keterangan = $data['keterangan'];
$gambar = $data['gambar'];
?>

<main id="main">
  <section class="mt-4">
    <div class="container mt-4">
      <div class="row">
        <div class="col-lg-8">
          <div id="map"></div>
        </div>
        <div class="col-lg-4">
          <div class="card">
            <div class="card-body">
              <!-- Vertical Form -->
              <form class="row g-3" action="proses_edit.php" method="post" enctype="multipart/form-data">
                <div class="col-12">
                  <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id ?>">
                </div>
                <div class="col-12">
                  <label for="latlng" class="form-label">Latitude, Longitude</label>
                  <input type="text" class="form-control" id="latlng" name="latlng" value="<?php echo $latlng ?>" required>
                </div>
                <div class="col-12">
                  <label for="nama" class="form-label">Nama Lokasi</label>
                  <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama ?>">
                </div>
                <div class="col-12">
                  <label for="kategori" class="form-label">Kategori</label>
                  <select class="form-select" name="kategori" id="kategori">
                    <option selected disabled>Pilih Kategori</option>
                    <option value="Negeri" <?php if ($kategori == "Negeri") echo "selected"; ?>>Negeri</option>
                    <option value="Swasta" <?php if ($kategori == "Swasta") echo "selected"; ?>>Swasta</option>
                  </select>
                </div>
                <div class="col-12">
                  <label for="keterangan" class="form-label">Keterangan</label>
                  <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?php echo $keterangan ?>">
                </div>
                <div class="col-12">
                  <label for="gambar" class="form-label">Gambar</label>
                  <input type="file" class="form-control" id="gambar" name="gambar">
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-info">Ubah</button>
                  <a href="lokasi.php" type="reset" class="btn btn-secondary">Kembali</a>
                </div>
              </form><!-- Vertical Form -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main><!-- End #main -->

<?php
include 'lib/footer.php';
?>

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
var map = L.map('map').setView([<?php echo $lat; ?>, <?php echo $lng; ?>], 15);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
  maxZoom: 19,
  attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

var popup = L.popup();

function onMapClick(e) {
  popup
    .setLatLng(e.latlng)
    .setContent("You clicked the map at " + e.latlng.toString())
    .openOn(map);

  var latlng = e.latlng;
  var lat = latlng.lat.toFixed(6);
  var lng = latlng.lng.toFixed(6);
  var latlng_format = lat + ', ' + lng;

  document.getElementById("latlng").value = latlng_format;
}

map.on('click', onMapClick);

var marker = L.marker([<?php echo $lat; ?>, <?php echo $lng; ?>]).addTo(map);

marker.bindPopup("<b><?php echo $nama; ?></b><br><?php echo $latlng; ?><br>Kategori : <?php echo $kategori; ?><br>Keterangan : <?php echo $keterangan; ?><br><img src='assets/img/<?php echo $gambar; ?>' alt='' width='150px'>").openPopup();
</script>

</body>
</html>
