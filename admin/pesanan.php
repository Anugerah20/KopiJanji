<?php 
@include "../Layouts/config.php";

// Jika belum login tidak bisa masuk ke halaman ini
error_reporting(0);
if($_SESSION['role'] == 'admin' ) {
   header("Location: ../cart-error.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- Icon Kopi Suka -->
   <link rel="shortcut icon" href="/assets/logo/favicon-16x16.png" type="image/x-icon">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="/assets/css/bootstrap.min.css" />

   <!-- Link Fontawesome -->
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

   <!-- CSS Custom -->
   <link rel="stylesheet" href="/assets/css/custom.css" />

   <title>Pesanan Masuk</title>
</head>

<body>
   <!-- START: Tambah Produk -->
   <div class="container">
      <h2 class="mt-5 text-capitalize">pesanan masuk</h2>
      <hr>
   </div>
   <!-- END: Tambah Produk -->

   <div class="container">
      <table class="table table-striped table-responsive-sm table-responsive-md table-responsive-lg">
         <thead>
            <tr>
               <th scope="col">No</th>
               <th scope="col">Nama</th>
               <th scope="col">Email</th>
               <th scope="col">Pembayaran</th>
               <th scope="col">Alamat</th>
               <th scope="col">Kota</th>
               <th scope="col">Kapubaten</th>
               <th scope="col">Produk</th>
               <th scope="col">Harga</th>
            </tr>
         </thead>
         <?php 
         include_once './Layouts/config.php';
         $number = 1;
         $query_pesanan = $db->query("SELECT nama,email,pembayaran,alamat,kota,kabupaten,total_product,total_price FROM orders");
         while($r = $query_pesanan->fetch_assoc()) :

         ?>
         <tbody>
            <tr>
               <td><?= $number; ?></td>
               <td><?= $r['nama']; ?></td>
               <td><?= $r['email']; ?></td>
               <td><?= $r['pembayaran']; ?></td>
               <td><?= $r['alamat']; ?></td>
               <td><?= $r['kota']; ?></td>
               <td><?= $r['kabupaten']; ?></td>
               <td><?= $r['total_product']; ?></td>
               <td><?= number_format($r['total_price']) . ",000"; ?></td>
            </tr>
         </tbody>
         <?php $number++; ?>
         <?php endwhile; ?>
      </table>

      <div>
         <a href="admin.php" class="btn btn-success">Kembali</a>
      </div>
   </div>

   <!-- Popper dan Bootstrap 5 JS -->
   <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>