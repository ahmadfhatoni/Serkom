<!--koneksi ke database dan melakukan pemanggilan data-->
<?php
include('koneksigraph.php');
$data_beasiswa = mysqli_query($connect, "SELECT beasiswa FROM beasiswa GROUP BY beasiswa");
$pendaftar = mysqli_query($connect,"SELECT COUNT(ipk) AS MasukanNama FROM beasiswa GROUP BY beasiswa");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--header-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grafik Jumlah Pendaftar Beasiswa</title>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    
    <!-- Javascript chart-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> 
    <link href="css/styles.css" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-twHYrWH1BIIU7AFC0C0enZWa5+8QWd5EYDO00xZr4aAsjQZgKucyIh8XJf4+Y0P" crossorigin="anonymous">
</head>
<body>
<!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #770e12; font-weight: 700;">
      <div class="container-fluid">
        <div class="collapse navbar-collapse justify-content-center" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase py-4 py-lg-0">
            <li class="nav-item" style="font-size: 20px;">
              <a class="nav-link text-white" aria-current="page" href="index.html">Dashboard</a>
            </li>
            <li class="nav-item" style="font-size: 20px;">
              <a class="nav-link text-white" href="form.php">Daftar</a>
            </li>
            <li class="nav-item" style="font-size: 20px;">
              <a class="nav-link text-white" href="getdata.php">Hasil</a>
            </li>
            <li class="nav-item" style="font-size: 20px;">
              <a class="nav-link text-white" href="grafik.php">Chart</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
    <style>
      /* Mengubah warna teks saat hover dan saat aktif */
      body, .navbar-nav .nav-link {
      font-family: 'Montserrat', sans-serif;
      }
      .navbar-nav .nav-link:hover,
      .navbar-nav .nav-link.active {
        background-color: #fb2f2f8a !important; /* Warna merah terang */
        color: #ffffff !important; /* Warna teks putih */
        border-radius: 5px; /* Menambahkan sedikit radius untuk membuatnya lebih menarik */
      }
    </style>
    <div class="container mt-4 mb-4">
        <h2 class="text-center">Chart Para Pendaftar</h2>
    </div>

    <div class="container">
        <canvas id="pendaftarChart"></canvas>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById("pendaftarChart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [<?php while($row = mysqli_fetch_array($data_beasiswa)){echo '"'.$row['beasiswa'].'",';}?>],
                    datasets: [{
                        label: 'Jumlah Pendaftar',
                        data: [<?php while($row = mysqli_fetch_array($pendaftar)){echo $row['MasukanNama'].',';}?>],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.7)',
                            'rgba(54, 162, 235, 0.7)',
                            'rgba(255, 206, 86, 0.7)',
                            'rgba(75, 192, 192, 0.7)',
                            'rgba(153, 102, 255, 0.7)',
                        ],
                        borderWidth: 2
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
        });
    </script>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-q6asLVICiRhmcXtFZ5O2eBK7ZcHsFnkdvaOo0DZw5ZCgBhKDUE2zw/g+a9F9IKpd" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+Wy0pE/dXhffgPKUa1TZ99PfDyJp/wwWSI" crossorigin="anonymous"></script>
</body>
</html>
