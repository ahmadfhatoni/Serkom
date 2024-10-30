<!--koneksi khusu untuk grafik-->

<?php

$host     = "localhost"; 
$username = "root";
$password = "";
$database = "serkom";

$connect = mysqli_connect($host,$username,$password,$database);

// if(mysqli_connect_error()){
//     echo "koneksi gagal";
// }else{
//     echo "koneksi berhasil";
// }


?>