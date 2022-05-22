<?php 
@include "./Layouts/config.php";

// Membuat pesanan masuk
if(isset($_POST['pesan_kopi'])) {
   $name         = $_POST['name'];
   $phone        = $_POST['phone'];
   $email         = $_POST['email'];
   $paymen       = $_POST['paymen'];
   $home         = $_POST['home'];
   $address      = $_POST['address'];
   $city         = $_POST['city'];
   $district     = $_POST['district'];

   session_start();
   $user_id = $_SESSION['id'];

   $cart_order = mysqli_query($db, "SELECT * FROM cart WHERE user_id = '$user_id'");
   $product_total = 0;
   if(mysqli_num_rows($cart_order) > 0) {
      while($data_product = mysqli_fetch_assoc($cart_order)) {
         $product_name[] = $data_product['name_product'] . ' (' . $data_product['quantity_product'] . ' )';
         $product_price = number_format($data_product['price_product'] * $data_product['quantity_product']);
         $data = ((int) $product_total += (int)$product_price);
      }
   }

   $total_product = implode(',', $product_name);

   
   $order_result = mysqli_query($db, "INSERT INTO orders(nama, no_telepon, email, metode_pembayaran, no_rumah,alamat_rumah, kota,kabupaten, total_product, total_price) VALUES('$name','$phone','$email','$paymen','$home','$address','$city', '$district','$total_product','$product_total')");

   // var_dump($order_result);
   // exit;

   if($cart_order && $order_result) {
      echo "<script>alert('Pesanan anda Sukses');</script>";
   } else {
      echo "<script>alert('Pesanan anda Gagal');</script>";
   }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Cart Janji Kopi</title>
   <!-- Icon Kopi Suka -->
   <link rel="shortcut icon" href="assets/logo/favicon-16x16.png" type="logo/png">

   <!-- Font Rubik -->
   <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700&display=swap" rel="stylesheet">

   <!-- Link Fontawesome -->
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

   <!-- Icon Bootstrap -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">

   <!-- Bootstrap 5 CSS -->
   <link rel="stylesheet" href="assets/css/bootstrap.min.css" />

   <!-- CSS Custom -->
   <link rel="stylesheet" href="assets/css/custom.css" />

</head>

<body>
   <div class="container">

      <!-- START: Judul Halaman Admin -->
      <div class="container-fuild">
         <div style="margin-top: 3rem;">
            <h2>Konfirmasi Pemesanan</h2>
            <small><strong class="text-danger">PENTING<i class="bi bi-exclamation-lg"></i></strong>&nbsp;isi data diri anda dengan benar</small>
         </div>
         <hr>
      </div>

      <!-- START: Menampilkan Pesanan Kopi -->
      <div class="container">
      <div class="row">
         <div class="col-md-4 text-center text-white p-3 mx-auto bg-success rounded">
            <h3 class="text-uppercase">pesanan kopi kamu</h3>
            <hr>
            <?php 
            include "./Layouts/config.php";
            session_start();
            $user_id = $_SESSION['id'];
            $query_cart = mysqli_query($db, "SELECT * FROM cart WHERE user_id = '$user_id'") or die($db);
            $total = 0;
            $grand_total = 0;

            if(mysqli_num_rows($query_cart) > 0) {
               while($checkout = mysqli_fetch_assoc($query_cart)) {
                  $total_price = number_format($checkout['price_product'] * $checkout['quantity_product']);
                  error_reporting(0);
                  $grand_total = $total += $total_price;
            ?>
            <span><?= $checkout['name_product']; ?> (<?= $checkout['quantity_product'] ?>)</span>

            <?php
               }
            } else {
               echo "<h5 class='text-center'>Keranjang Kosong!</h5>";
            }
            ?>
            <div class="mt-2 text-white"><strong>Total Harga Rp <?= $grand_total . ",000"; ?></strong></div>
         </div>
      </div>
      </div>
      <!-- END:  Menampilkan Pesanan Kopi  -->

      <form action="" method="POST">
         <div class="container mt-5">
            <div class="row">
               <!-- Start Name -->
               <div class="col-md-5 col-lg-5 mb-3">
                  <div class="input-group">
                     <label for="name" class="input-group">Nama</label>
                     <input type="text" class="form-control" name="name" id="name" placeholder="Isi nama anda" required>
                  </div>
               </div>
               <!-- End Name -->

               <div class="col-md-5 col-lg-5 mb-3">
                  <div class="input-group">
                     <label for="phone" class="input-group">No Telepon</label>
                     <input type="text" class="form-control" name="phone" id="phone" placeholder="Isi nomor telepon" required>
                  </div>
               </div>

               <div class="col-md-5 col-lg-5 mb-3">
                  <div class="input-group">
                     <label for="email" class="input-group">Email</label>
                     <input type="text" class="form-control" name="email" id="email" placeholder="Isi email anda" required>
                  </div>
               </div>

               <div class="col-md-5 col-lg-5 mb-3">
                  <div class="input-group">
                     <label for="paymen" class="input-group">Metode Pembayaran</label>
                     <select class="form-select" name="paymen" id="paymen">
                        <option selected>-- Pilih Pembayaran --</option>
                        <option value="COD">COD</option>
                        <option value="Gopay">Gopay</option>
                        <option value="Paypal">Paypal</option>
                        <option value="BCA">BCA</option>
                        <option value="BRI">BRI</option>
                     </select>
                  </div>
               </div>

               <div class="col-md-5 col-lg-5 mb-3">
                  <div class="input-group">
                     <label for="home" class="input-group">No Rumah</label>
                     <input type="text" class="form-control" name="home" id="home" placeholder="Isi no rumah anda" required>
                  </div>
               </div>

               <div class="col-md-5 col-lg-5 mb-3">
                  <div class="input-group">
                     <label for="address" class="input-group">Alamat Rumah</label>
                     <input type="text" class="form-control" name="address" id="address" placeholder="Isi alamat rumah anda" required>
                  </div>
               </div>

               <div class="col-md-5 col-lg-5 mb-3">
                  <div class="input-group">
                     <label for="city" class="input-group">Kota</label>
                     <input type="text" class="form-control" name="city" id="city" placeholder="Kota anda" required>
                  </div>
               </div>

               <div class="col-md-5 col-lg-5 mb-3">
                  <div class="input-group">
                     <label for="district" class="input-group">Kabupaten</label>
                     <input type="text" class="form-control" name="district" id="district" placeholder="Kabupaten anda" required>
                  </div>
               </div>

               <!-- <div class="col-md-5 col-lg-5 mb-3">
            <div class="input-group">
               <label for="negara" class="input-group">Negara</label>
               <input type="text" class="form-control" name="negara" id="negara" placeholder="Negara anda" required>
            </div>
         </div> -->

               <!-- <div class="col-md-5 col-lg-5 mb-3">
            <div class="input-group">
               <label for="kode" class="input-group">Kode Unik</label>
               <input type="text" class="form-control" name="kode" id="kode" placeholder="Kode unik anda" required>
            </div>
         </div> -->

               <div class="mb-5">
                  <button type="submit" name="pesan_kopi" class="btn btn-outline-secondary" name="submit">Pesan Sekarang</button>
               </div>

            </div>
      </form>

   </div>
   </div>

   <!-- Popper dan Bootstrap 5 JS -->
   <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>