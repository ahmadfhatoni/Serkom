<?php
// mengambil data dari form
$MasukanNama = $_POST['MasukanNama'];
$MasukanEmail = $_POST['MasukanEmail'];
$NomorHP = $_POST['NomorHP'];
$smt  = $_POST['smt'];
$ipk = $_POST['ipk'];
$beasiswa   = $_POST['beasiswa'];
$status = $_POST['status_ajuan'];



// membuat koneksi ke database
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'serkom';

$koneksi = mysqli_connect($host, $username, $password, $database);

// memasukkan data ke dalam tabel

$sql = "INSERT INTO beasiswa VALUES ('$MasukanNama', '$MasukanEmail', '$NomorHP','$smt','$ipk','$beasiswa','$status')";
$result = mysqli_query($koneksi, $sql);

if ($result) {
  echo "Data berhasil dikirim";
} else {
  echo "Terjadi kesalahan: " . mysqli_error($koneksi);
}

// menutup koneksi
mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyBeasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
<link href="css/styles.css" rel="stylesheet" />
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
<div class = "form-daftar">
<!--untuk menampilkan hasil dari form setelah kirim-->
<div class="container mt-4">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h2 class="card-title text-center">Hasil Form Pendaftaran</h2>

          <div class="table-responsive">
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <th>Nama:</th>
                  <td><?= $_POST['MasukanNama'] ?></td>
                </tr>
                <tr>
                  <th>Email:</th>
                  <td><?= $_POST['MasukanEmail'] ?></td>
                </tr>
                <tr>
                  <th>Nomor HP:</th>
                  <td><?= $_POST['NomorHP'] ?></td>
                </tr>
                <tr>
                  <th>Semester:</th>
                  <td><?= $_POST['smt'] ?></td>
                </tr>
                <tr>
                  <th>IPK:</th>
                  <td><?= $_POST['ipk'] ?></td>
                </tr>
                <tr>
                  <th>Beasiswa:</th>
                  <td><?= $_POST['beasiswa'] ?></td>
                </tr>
                <tr>
                  <th>Status Ajuan:</th>
                  <td><?= $_POST['status_ajuan'] ?></td>
                </tr>
                <tr>
                  <th>File Berkas:</th>
                  <td><?php 
                        // var_dump(count($_FILES['data']['name']));
                        $folder = "assets/uploads";
                        if(!is_dir($folder)){
                            mkdir($folder, 0777, $rekursif = true);
                        }
                        for($i = 0; $i<count($_FILES['data']['name']); $i++){
                            // echo $_FILES['data']['name'][$i];

                            $tmp = $_FILES["data"]["tmp_name"][$i];
                            $filename = $_FILES["data"]["name"][$i];
                            $location = $folder.'/'.$filename;

                            $proses_up = move_uploaded_file($tmp, $location);

                            echo '<a href="'
                            .$location.
                            '" target="_blank">'.$filename.'</a> ';

                            echo "<br>";

                            if($proses_up){

                            }
                        }
                        ?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</body>
</html>