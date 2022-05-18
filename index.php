<?php
// Menjalankan session
session_start();

// Menghubungkan ke database
include './Layouts/config.php';

// Pesan ketika gagal masuk
// if(isset($_GET['msg'])) {
//    if($_GET['msg'] == "failed") {
//       echo "<script>alert('Username atau Password Salah!');</script>";
//    }
// }

// Buat kondisi ketika mau login
//Jika tidak login maka tidak bisa masuk ke halaman ini
// if(!isset($_SESSION['login'])) {
//    header("Location: login.php");
//    exit;
//}

// Membuat halaman website menjadi dinamis
include './Layouts/navigasi.php';
include './Layouts/beranda-slider.php';
include './Layouts/pelayanan.php';
include './Layouts/produk-kopi.php';
include './Layouts/footer.php';

?>