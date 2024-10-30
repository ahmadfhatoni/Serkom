<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link href="css/styles.css" rel="stylesheet" />
    <style>
      * {
        padding: 0;
        margin: 0;
        font-family: sans-serif;
        color: black;
      }
      body {
        min-height: 100vh;
        background: navajowhite;
      }
      .container {
        margin: auto;
        width: 80%;
      }
      .form-daftar {
        
        background: white;
      }
      .form-daftar .form-group {
        display: flex;
        justify-content: space-between;
        margin: 10px;
      }
      .form-daftar .form-group label {
        max-width: 50%;
      }
      .form-daftar .form-group input,
      .form-daftar .form-group select {
        width: 50%;
        outline: none;
        /* border: none; */
        height: 35px;
        padding: 5px;
        box-sizing: border-box;
      }

      .btn-group {
        width: 100%;
        display: flex;
        justify-content: center;
        gap: 50px;
      }

      .btn-group button, .btn-group a {
        font-size: 1.2em;
        padding: 5px 20px;
        background: white;
        text-decoration: none;
        text-align: center;
        border: 2px solid brown;
        color: black;
      }
      .btn-group button:disabled {
        opacity: .7;
      }
      input:focus, select:focus {
        border: 2px solid blue;
      }
    </style>
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
    <div class="container">
      <nav>
        <div class="nav-item"></div>
      </nav>
      <main>
        <!--pembuatan form pendaftaran-->
        <div class="form-daftar">
          <h2 class="text-center mt-4 mb-4" >Form Pendaftaran</h2>

          <form action="hasilform.php" method="post" enctype="multipart/form-data" class="form">
            <div class="form-group">
              <label for="">Masukan Nama</label>
              <input name="MasukanNama" id = "MasukanNama"type="text" required />
            </div>
            <div class="form-group">
              <label for="">Masukan Email</label>
              <input type="email" name="MasukanEmail" onkeydown="checkEmail(this)" required />
            </div>
            <div class="form-group">
              <label for="">Nomor HP</label>
              <input type="number" name="NomorHP" onchange="console.log(this.value)" required />
            </div>
            <div class="form-group">
              <label for="">Semseter Saat Ini</label>
              <select name="smt" id="" onchange="semester(this)" required>
                <option value="0">--Pilih--</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
              </select>
            </div>
            <div class="form-group">
              <label for="">IPK Terakhir</label>
              <input name="ipk" type="text" id="ipk" readonly />
            </div>
            <div class="form-group">
              <label for="">Pilihan Beasiswa</label>
              <select name="beasiswa" id="beasiswa" required  disabled="false">
              <option value="">--Pilih--</option>
                <option value="Beasiswa Jalur Rapor 1 (JPA1)">Beasiswa Jalur Rapor 1 (JPA1)</option>
                <option value="Beasiswa KOMINFO">Beasiswa KOMINFO</option>
                <option value="Beasiswa Master by Research">Beasiswa Master by Research</option>
              </select>
            </div>
            <!--memasukan file berkas only pdf-->
            <div class="form-group">
              <label for="">Masukan Berkas</label>
              <input name="data[]" type="file" id="berkas" accept="application/pdf"/>
            </div>
            <!--status ajuan-->
            <div class="form-group">
              <input type="text" name="status_ajuan" hidden value ="belum diverifikasi" />
            </div>

            <div class="btn-group">
              <button id="btnSubmit" type="submit" style= "background-color: #770e12;
            border-color: #770e12;
            color: #ffffff;">Kirim</button>
              <a href="#">Batal</a>
            </div>
            <style>
            /* Atur font seluruh formulir menggunakan Montserrat */
            body, .form-daftar, .form-group label, .form-group input, .form-group select, .btn-group button, .btn-group a {
              font-family: 'Montserrat', sans-serif;
            }
          </style>
          </form>
        </div>
      </main>
    </div>
    <!--fungsi untuk menentukan jika ipk dibawah 3 tidak dapat mendaftar-->
    <script>
      function semester(smt) {
        const nilai = [2.4, 2.2, 3.1, 2.5, 2.8, 1.9, 3.8, 3.9];
        const ipk = nilai[smt.value - 1];

        if(smt.value!=0){
          document.querySelector("#ipk").value = ipk;
          checkIpk(ipk)
        }
        else {
          document.querySelector("#ipk").value = "";
        }
      }

      function checkIpk(ipkku){
        if(ipkku>3){
          document.querySelector("#beasiswa").disabled = false;
          document.querySelector("#beasiswa").focus();
          document.querySelector("#berkas").disabled = false;
          document.querySelector("#btnSubmit").disabled = false;
        }
        else {
          document.querySelector("#beasiswa").disabled = true;
          document.querySelector("#berkas").disabled = true;
          document.querySelector("#btnSubmit").disabled = true;
        }
      }

      function checkEmail(ini) {
        // const regex = new RegExp("[a-z0-9]+@[a-z]+\.[a-z]{3}");

        // isValid = regex.test(ini.value);

        // console.clear();
        // console.log(isValid);
      }
    </script>
  </body>
</html>
