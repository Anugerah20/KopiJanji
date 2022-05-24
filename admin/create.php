<?php 
@include "../Layouts/config.php";

// Jika belum login tidak bisa masuk ke halaman ini
if(!isset($_SESSION['role'])) {
   header("Location: ../cart-error.php");
}
?>

<?php
// Menghubungkan ke database
include '../Layouts/config.php';

// Mengaktifkan Session
session_start();

// Membuat random string
// agar nama file foto tidak sama
function generateRandomString($length = 10)
{
   $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
   $charactersLength = strlen($characters);
   $randomString = '';
   for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
   }
   return $randomString;
}

?>

<?php
// Mengambil data dari form
if (isset($_POST['tambah'])) {
   $name         = htmlspecialchars($_POST['name']);
   $price        = htmlspecialchars($_POST['price']);

   // Membuat upload file foto
   $target_dir    = "../assets/fotoProduk/";
   $nama_file     = basename($_FILES["image"]["name"]);
   $target_file   = $target_dir . $nama_file;
   $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
   $image_size    = $_FILES['image']['size'];
   $random_name   = generateRandomString(20);
   $new_name      = $random_name . "." . $imageFileType;

   // cek apakah nama dan harga kosong atau tidak
   // Kalau kosong tidak bisa diupload
   if ($name == '' || $price == '') {

?>

      <div class="alert alert-warning" role="alert">
         Nama dan harga produk kopi wajib di isi!
      </div>
      <meta http-equiv="refresh" content="2;url=create.php" />

      <?php
   } else {
      if ($nama_file != '') {
         // Jika foto lebih dari 2 mb
         // Maka akan muncul peringatan bahwa foto tidak boleh lebih dari 2 mb
         if ($image_size > 2000000) {
      ?>

            <div class="alert alert-warning" role="alert">
               Foto tidak boleh lebih dari 2 Mb
            </div>
            <meta http-equiv="refresh" content="2;url=create.php" />

            <?php
         } else {
            // Jika foto tidak sesuai dengan ekstensi dibawah ini
            // Maka akan muncul pesan peringatan melaui alert
            if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg') {
            ?>

               <div class="alert alert-warning" role="alert">
                  Hanya file jpg, jpeg dan png yang diperbolehkan
               </div>
               <meta http-equiv="refresh" content="2;url=create.php" />

               <?php
            } else {
               // upload file foto
               move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir . $new_name);

               //memasukkan ke database product
               $query = mysqli_query($db, "INSERT INTO product (name_product, price_product, image_product) VALUES ('$name', '$price', '$new_name')");

               // Jika semua persyaratan sudah terpenuhi
               // Maka akan muncul pesan alert berhasil
               if ($query) {
               ?>

                  <div class="alert alert-success" role="alert">
                     Data produk kopi berhasil ditambahkan
                  </div>
                  <meta http-equiv="refresh" content="2;url=admin.php" />

<?php
               } else {
                  // Tampilkan eror jika ada kesalahan di database
                  echo mysqli_error($db);
               }
            }
         }
      }
   }
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

   <title>Tambah Produk</title>
</head>

<body>
   <!-- START: Tambah Produk -->
   <div class="container">
      <h2 class="mt-5">Tambah Produk Kopi</h2>
      <hr>

      <div class="row">
         <form action="" method="POST" enctype="multipart/form-data">
            <div class="col-md-6 mb-4 mt-4">
               <label for="name" class="form-label">Nama Produk</label>
               <input type="text" name="name" class="form-control" id="name">
            </div>
            <div class="col-md-6 mb-4 mt-4">
               <label for="price" class="form-label">Harga Produk</label>
               <input type="text" name="price" class="form-control" placeholder="harus di isi angka!" id="price">
            </div>
            <div class="col-md-6 mb-4 mt-4">
               <label for="image" class="form-label">Gambar Produk</label>
               <input type="file" name="image" class="form-control" id="image">
               <small class="text-danger"><strong>*upload gambar yang berekstensi PNG, JPG, dan JPEG</strong></small>
            </div>

            <button type="submit" class="btn btn-primary" name="tambah">Simpan Produk</button>
         </form>
      </div>
   </div>
   <!-- END: Tambah Produk -->

   <!-- Popper dan Bootstrap 5 JS -->
   <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>