<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyBeasiswa</title>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
<link href="css/styles.css" rel="stylesheet" />
</head>
<body>
<!-- Navigation-->
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
        <h2 class="text-center">Daftar Calon Penerima Beasiswa</h2>
    </div>

</body>
</html>
<?php
// membuat koneksi ke database
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'serkom';

$koneksi = mysqli_connect($host, $username, $password, $database);

// mengambil data dari tabel
$sql = "SELECT * FROM beasiswa";
$result = mysqli_query($koneksi, $sql);

if (mysqli_num_rows($result) > 0) {
  // menampilkan data pada halaman hasil
  echo '<div class="container">';
  echo '<table class="table table-bordered">';
  echo '<thead class="thead-dark">';
  echo '<tr><th>Nama</th><th>Email</th><th>Nomor HP</th><th>Semester</th><th>IPK</th><th>Beasiswa</th><th>Status</th></tr>';
  echo '</thead>';
  echo '<tbody>';
  
  while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>' . $row['MasukanNama'] . '</td>';
    echo '<td>' . $row['MasukanEmail'] . '</td>';
    echo '<td>' . $row['NomorHP'] . '</td>';
    echo '<td>' . $row['smt'] . '</td>';
    echo '<td>' . $row['ipk'] . '</td>';
    echo '<td>' . $row['beasiswa'] . '</td>';
    echo '<td>' . $row['status_ajuan'] . '</td>';
    echo '</tr>';
  }
  
  echo '</tbody>';
  echo '</table>';
  echo '</div>';
  
} else {
  echo "Data tidak ditemukan";
}

// menutup koneksi
mysqli_close($koneksi);
?>
