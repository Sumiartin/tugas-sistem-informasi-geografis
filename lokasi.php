
<html>

<body>

<?php
include "koneksi.php";
  include 'lib/head.php';
?>

  <main id="main">
<section>
<div class="container mt-5">
<div class="card">
            <div class="card-body">
            <a href="lokasi_tambah.php" type="button" class="btn btn-info">Tambah Data</a>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Latitude, Longitude</th>
                    <th>Nama Lokasi</th>
                    <th>Kategori</th>
                    <th>Keterangan</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                        $tampil=mysqli_query($koneksi, "SELECT * FROM lokasi");
                        while($hasil = mysqli_fetch_array($tampil)){

                        
                    ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $hasil['lat_lng']; ?></td>
                    <td><?php echo $hasil['nama']; ?></td>
                    <td><?php echo $hasil['kategori']; ?></td>
                    <td><?php echo $hasil['keterangan']; ?></td>
                    <td><img src="assets/img/<?php echo $hasil['gambar']?>" alt="Gambar" width="150px"></td>
                    <td>
                        <a href="lokasi_edit.php?id=<?php echo $hasil['id'] ?>" type="button" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                        <a href="proses_hapus.php?id=<?php echo $hasil['id'] ?>" type="button" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                    </td>
                  </tr>
                  <?php
                  $no++;
                        }

                  ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

</section>
  </main><!-- End #main -->

  <?php
  include 'lib/footer.php';
?>

</body>

</html>