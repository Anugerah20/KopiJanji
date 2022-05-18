<?php
// Menghubungkan ke database
@include './Layouts/config.php';

// Mengaktifkan session
session_start();

// Buat kondisi ketika mau login
// Jika tidak login maka tidak bisa masuk ke halaman ini
if ($_SESSION['role'] != 'user') {
   if($_SESSION['role'] != 'admin'){
   header("Location: cart-error.php");
   exit;
   }
}

// Membuat update product
if(isset($_POST['update_btn_cart'])) {
   $update_value   = $_POST['update_quantity'];
   $update_id      = $_POST['id_update_quantity'];
   $update_query   = mysqli_query($db, "UPDATE cart SET quantity_product = '$update_value' WHERE id = '$update_id'");
   if($update_query) {
      header("location: cart.php");
   };
};

// Membuat delete product
if(isset($_GET['remove'])) {
   $id_remove = $_GET['remove'];
   mysqli_query($db, "DELETE FROM cart WHERE id = '$id_remove'");
   header("location: cart.php");
}

?>

<?php 
include './Layouts/navigasi.php';
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

   <!-- Bootstrap 5 CSS -->
   <link rel="stylesheet" href="assets/css/bootstrap.min.css" />

   <!-- CSS Custom -->
   <link rel="stylesheet" href="assets/css/custom.css" />

   <!-- CSS Table Cart -->
   <style>

      th,tr,td {
         border: 0;
      }
   </style>
</head>

<body>
   <div class="container">

      <!-- START: Judul Halaman Admin -->
      <div class="container-fuild">
         <div style="margin-top: 6.5rem;">
            <h2>Cart Kopi Janji</h2>
            <p class="mt-4" name="date">Tanggal&nbsp;&nbsp;<strong><?php echo date("m/d/Y"); ?></strong></p>
      </div>
   </div>
   <hr>

      <div class="row">
         <div class="col-md-11">
            <table class="table table-responsive-lg table-responsive-md table-responsive-sm text-center mt-3">
               <thead>
                  <tr>
                     <th scope="col">Nama</th>
                     <th scope="col">Harga</th>
                     <th scope="col">Jumlah</th>
                     <th scope="col">Total</th>
                     <th scope="col">Status</th>
                  </tr>
               </thead>

               <tbody>
                  <?php
                  $user_id = $_SESSION['id'];
                  $grand_total = 0;
                  $cart_select = mysqli_query($db, "SELECT * FROM cart WHERE user_id = '$user_id'");

                  if(mysqli_num_rows($cart_select) > 0) {
                     while($row_cart = mysqli_fetch_assoc($cart_select)) {

                  
                  ?>
                  <!-- START: Pesanan 1 -->
                  <tr>
                     <td><?= $row_cart['name_product']; ?></td>
                     <td>
                        Rp <?= number_format($row_cart['price_product']); ?>
                     </td>
                     <td>
                        <form action="" method="POST">
                           <input type="hidden" name="id_update_quantity"
                           value="<?= $row_cart['id']; ?>">
                           <input type="number" min="1" name="update_quantity"
                           value="<?= $row_cart['quantity_product']; ?>">
                           <input type="submit" value="update" class="btn btn-dark btn-sm text-white" name="update_btn_cart">
                        </form>
                     </td>
                     <td>
                        Rp <?php echo $sub_total = number_format($row_cart['price_product'] * $row_cart['quantity_product']); ?>/-
   
                     </td>
                     <td>
                        <a href="cart.php?remove=<?= $row_cart['id']; ?>" onclick="return confirm('Mau hapus kopi ini?');" title="Hapus"><i class="fas fa-trash-alt"></i></a>
                     </td>
                  </tr>
                  <!-- END: Pesanan 1 -->
                     <?php 
                     //error_reporting(0);
                     $grand_total += $sub_total;
                        }
                     }
                     ?>

               <tr>
               </tr>
               </tbody>
            </table>
            
         </div>
      </div>
         <div class="row">
            <div class="col-md-10 col-sm-12 mt-4 col-sm-10">
            <div class="d-flex justify-content-between">
            <div class="btn btn-success btn-sm"><a href="index.php" style="text-decoration: none; color: #fff;">Kembali Belanja</a></div>
         </div>
      </div>

      <div class="col-md-10 col-sm-12 col-sm-10">  
         <div class="d-flex justify-content-between align-content-center" style="margin-top: 4rem;">
               <p style="font-size: 18px;">Total Belanja :</p>
               <p style="font-size: 18px;" class="float-end">Rp <?= $grand_total . ",000"; ?> /-</p>
         </div>
      </div>
   </div>

   <div class="row">
      <div class="col-md-10 col-sm-12 col-sm-10 mx-auto mt-3 mb-5">
         <div class="d-flex justify-content-center align-content-center">
            <div class="btn btn-secondary btn-sm <?= ($grand_total > 1)?'':'disabled'?>"><a class="text-white" style="text-decoration:none;" href="checkout.php">Checkout Sekarang</a></div>
         </div>
      </div>
   </div>

   </div>
   <!-- Popper dan Bootstrap 5 JS -->
   <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>