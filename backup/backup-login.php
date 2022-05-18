<?php
// Mengaktifkan session
session_start();

// Menghubungkan ke database
include './Layouts/config.php';

// Jika sudah login maka akan masuk ke halaman index kopi
if(isset($_SESSION['login'])) {
   header("Location: index.php");
   exit;
}

// Jika menekan tombol login maka akan masuk ke proses login
if (isset($_POST['log'])) {
   $username = $_POST['username']; // Mengambil data username
   $password = $_POST['password']; // Mengambil data password
   // $level    = $_POST['level']; // Mengambil data level


   // START MultiLevel Login
   $query = mysqli_query($db, "SELECT * FROM multilevel WHERE username='$username' AND password ='$password'");
   // Cek jumlah baris yang ada di table multilevel
   $cek    = mysqli_num_rows($query);
   // cek apakah data yang di inputkan ada di database multilevel
   if($cek > 0) {
      // Jika data ditemukan
      $dataRole = mysqli_fetch_assoc($query);
      $role = $dataRole['role'];
      // Jika admin 
      if($role=="admin") {
         // Buat session username admin
         $_SESSION['username'] = $username;
         $_SESSION['role'] = "admin"; 

         // redirect ke halaman admin.php
         header("Location: ../admin/admin.php");
      }

   } else{
      // Buat session username user
      $_SESSION['username'] = $username;
      $_SESSION['role'] = "user";
      // redirect ke halaman index.php
      header("Location: index.php");
    } 
   // else {
   //    header("Location:index.php?msg=failed");
   // }
   //END MultiLevel Login


   // Mengecek username apakah tersedia di database atau tidak
   $result2 = mysqli_query($db, "SELECT * FROM multilevel WHERE username = '$username'");

   //mengecek username
   if (mysqli_num_rows($result2) === 1) {
      // Mengecek password
      $row = mysqli_fetch_assoc($result2);
      if (password_verify($password, $row["password"])) {
         // Mengatur session
         $_SESSION['login'] = true;
         // Jika berhasil login akan masuk ke halaman kopi
         header("Location: ../admin/admin.php");
         exit;
      }
   }
   // multiuser
   // Jika username dan password tidak sesuai maka akan muncul notifikasi error
   $error = TRUE;
}

?>

<html>
     <!-- Alert Error -->
     <?php if(isset($error)) : ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>login gagal!&nbsp;</strong> username sudah ada yang menggunakan, silahkan isi username lain.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
   <?php endif; ?>
   <!-- Alert Error -->
</html>