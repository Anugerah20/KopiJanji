<?php 
// Menghubungkan ke database
include '../Layouts/config.php';

// Mengaktifkan session
session_start();

//Buat kondisi ketika mau login
//Jika tidak login maka tidak bisa masuk ke halaman ini
//if($_SESSION['login'] == 'login') {
//   header("Location: ../login.php");
//   exit;
//}

// Jika bukan admin maka tidak bisa masuk ke halaman ini
if($_SESSION['role'] != 'admin') {
   header("Location: ../login.php");
   exit();
}

// Menangkap name dari table multilevel
if(isset($name)) {
   $name = $_POST['name'];
}

?>

<!doctype html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- Icon Kopi Suka -->
   <link rel="shortcut icon" href="/assets/logo/favicon-16x16.png" type="image/x-icon">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="/assets/css/bootstrap.min.css" />
   
   <!-- Link Fontawesome -->
  <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous"> -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

   <!-- CSS Custom -->
   <link rel="stylesheet" href="/assets/css/custom.css" />

   <title>Admin page</title>
</head>

<body>
   <div class="container">
      <!-- START: Judul Halaman Admin -->
      <div class="mt-5">
         <p> 
         </p>
            
         <h3>Halaman Admin Janji Kopi</h3>
         <hr>
      </div>
   </div>
   <!-- END: Judul Halaman Admin -->

   <!-- START: Menu Kopi -->
   <div class="container mt-5 mb-5">
      <div class="row">
         <div class="col-md-7">
            <!-- START: Tambah Produk Kopi -->
            <a class="btn btn-outline" href="create.php"><i class="fa fa-plus-square"></i>&nbsp;Tambah Produk</a>
            <!-- END: Tambah Produk Kopi -->
            <table class="table table-responsive text-center mt-5" style="border: none;">
               <thead>
                  <tr>
                     <th scope="col">No</th>
                     <th scope="col">Menu</th>
                     <th scope="col">Harga</th>
                     <th scope="col">Gambar</th>
                     <th scope="col">Status</th>
                  </tr>
               </thead>
               <tbody>
                  <?php 
                     // Menambahkan id secara urut
                     $number = 1;
                     // Mengambil data dari table produk
                     $product = $db->query("SELECT * FROM product");
                     // Menampilkan data dari table produk
                     while ($row = $product->fetch_assoc()) : 
                  ?>
                  <th scope="row"><?= $number; ?></th>
                  <td><?php echo $row['name_product']; ?></td>
                  <td>Rp&nbsp;<?=  number_format($row['price_product']); ?></td>
                  <td><img width="80" src="../assets/fotoProduk/<?= $row['image_product']; ?>"></td>
                  <td>
                     <a class="pe-3" href="delete.php?id=<?= $row['id']; ?>" onclick="return confirm('Anda mau hapus produk ini?')"><i class="fas fa-trash-alt"></i></a>

                    <a href="edit.php?id=<?= $row['id']; ?>"><i class="far fa-edit"></i></a>
                  </td>
               </tbody>
               <?php $number++; ?>
               <?php endwhile; ?>
            </table>
         </div>

         <div class="col-md-4">
            <div class="card mt-5">
               <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                     <h5>
                     <i class="fa fa-user"></i>&nbsp;&nbsp;Selamat datang, 
                     <?php echo $_SESSION['name']; ?> admin
                     </h5>
                  </li>
                  <li class="list-group-item">
                     <a href="admin.php" style="text-decoration: none;"><i class="fa fa-coffee"></i>&nbsp;&nbsp;Produk Kopi</a>
                  </li>
                  <li class="list-group-item">
                     <a href="pesanan.php" style="text-decoration: none;"><i class="fa fa-check-square"></i>&nbsp;&nbsp;Pesanan Masuk</a>
                  </li>
                  <li class="list-group-item">
                     <a href="../logout.php" style="text-decoration: none;"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;Keluar</a>
                  </li>
               </ul>
            </div>
         </div>
      </div>
      <!-- END: Menu Kopi -->
   </div>

   <!-- Popper dan Bootstrap 5 JS -->
   <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>