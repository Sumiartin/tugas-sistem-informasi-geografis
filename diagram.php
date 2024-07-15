<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Diagram Batang</title>
  <link rel="stylesheet" href="path/to/your/css/file.css"> <!-- Link ke file CSS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      background-color: #f0f8ff; /* Latar belakang halaman yang lembut */
    }

    .container {
      margin-top: 50px; /* Jarak dari navbar */
      display: flex;
      justify-content: center;
    }

    .canvas-container {
      width: 80%;
      max-width: 800px; /* Perbesar ukuran maksimal */
      background-color: #ffffff; /* Warna latar belakang canvas */
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    #myChart {
      width: 100% !important;
      height: 400px !important; /* Perbesar ukuran tinggi canvas */
    }
  </style>
</head>
<body>
    <?php
    
include 'lib/head.php';
    ?>

<div class="container">
  <div class="canvas-container">
    <?php
    include 'koneksi.php'; // Pastikan file koneksi disertakan
    $negeri = mysqli_query($koneksi, "SELECT * FROM lokasi WHERE kategori = 'Negeri'");
    $jmlnegeri = mysqli_num_rows($negeri);
    $swasta = mysqli_query($koneksi, "SELECT * FROM lokasi WHERE kategori = 'Swasta'");
    $jmlswasta = mysqli_num_rows($swasta);
    ?>

    <canvas id="myChart"></canvas>

    <script>
    var xValues = ["Negeri", "Swasta"];
    var yValues = [<?php echo $jmlnegeri ?>, <?php echo $jmlswasta ?>];
    var barColors = ["#FF6384", "#36A2EB", "#FFCE56", "#4BC0C0", "#9966FF"];
    var borderColors = ["#FF6384B0", "#36A2EBB0", "#FFCE56B0", "#4BC0C0B0", "#9966FFB0"];

    new Chart("myChart", {
      type: "bar",
      data: {
        labels: xValues,
        datasets: [{
          backgroundColor: barColors,
          borderColor: borderColors,
          borderWidth: 2,
          data: yValues
        }]
      },
      options: {
        legend: {display: false},
        title: {
          display: true,
          text: "DIAGRAM BATANG",
          fontSize: 18,
          fontColor: '#333'
        },
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
    </script>
  </div>
</div>

</body>
</html>
