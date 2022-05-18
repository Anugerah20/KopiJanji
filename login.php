<?php
// Mengaktifkan session
session_start();

// Menghubungkan ke database
include './Layouts/config.php';

// Melakukan query database
$query = mysqli_query($db, "SELECT * FROM multilevel");

// Mengubah database user menjadi array
$user = mysqli_fetch_assoc($query);

error_reporting(0);

// Periksa button login sudah diklik
if (isset($_POST['login'])) {
   // Jika sudah di klik, Menyimpan data dari form ini
   $id = $_GET['id'];
   $username = htmlspecialchars($_POST['username']);
   $password = htmlspecialchars($_POST['password']);

   // Melakukan query untuk mengambil data dari database table multilevel
   $result = mysqli_query($db, "SELECT * FROM multilevel WHERE 
            username = '$username' AND password = '$password'");

   // Menghitung jumlah row
   $cek = mysqli_num_rows($result);

   // Jika datanya ada
   if ($cek > 0) {

         // Ubah data di variable result menjadi array
         $row = mysqli_fetch_assoc($result);

         // Jika password sama dengan di database
         if ($password === $row['password']) {
            // Kalau ada, Cek kembali apakah user itu role admin atau user
            if ($row['role'] === 'admin') {
               // Jika admin, Buat session khusus admin
               $_SESSION['id'] = $row['id'];
               $_SESSION['email'] = $row['email'];
               $_SESSION['username'] = $_POST['username'];
               $_SESSION['name'] = $row['name'];
               $_SESSION['role'] = 'admin';
               // Redirect ke halaman admin.php
               header("Location: ../admin/admin.php");
               exit;
            } else {
               // Jika user biasa, Buat session khusus user
               $_SESSION['name'] = $row['name'];
               $_SESSION['id']   = $row['id'];
               $_SESSION['email'] = $row['email'];
               $_SESSION['username'] = $_POST['username'];
               $_SESSION['role'] = 'user';
               // Redirect ke halaman index.php
               header("Location: index.php");
               exit;
            }
         } else {
            // Jika password atau username salah
            echo "<script>alert('Password atau username salah!');</script>";
         }
      } else {
         // Jika password atau username salah
         echo "<script>alert('Password atau username salah!');</script>";
      }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="Kopi Suka">

   <!-- Icon Kopi Suka -->
   <link rel="shortcut icon" href="assets/logo/favicon-16x16.png" type="image/x-icon">

   <!-- Font Rubik -->
   <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700&display=swap" rel="stylesheet">

   <!-- Link Fontawesome -->
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

   <!-- Icon Bootstrap -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

   <!-- Bootstrap 5 CSS -->
   <link rel="stylesheet" href="assets/css/bootstrap.min.css" />

   <!-- CSS Custom -->
   <link rel="stylesheet" href="assets/css/custom.css" />

   <title>Login - janji kopi</title>

</head>

<body>

   <!-- START: Login -->

   <div class="container">

      <!-- START: Container -->
      <div class="container mt-card">
         <div class="row">
            <div class="col-md-8 col-lg-6 mx-auto">
               <div class="card border-0 shadow">
                  <div class="card-body">
                     <h2 class="text-left">Login</h2>
                     <hr>
                     <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                        <div class="col-md-12 mx-auto mb-4">
                           <label for="username" class="form-label">Username</label>
                           <input type="username" name="username" class="form-control" id="username" autocomplete="off" required oninvalid="this.setCustomValidity('harap isi bidang ini')" oninput="this.setCustomValidity('')">
                        </div>
                        <div class="col-md-12 mx-auto mb-4">
                           <label for="password" class="form-label">Password</label>
                           <div class="input-group">
                              <input type="password" class="form-control" name="password" id="password" required oninvalid="this.setCustomValidity('harap isi bidang ini')" oninput="this.setCustomValidity('')">
                              <span class="input-group-text">
                                 <a href="#" class="text-dark" id="show-eye">
                                    <i class="fas fa-eye" id="show" style="cursor: pointer;"></i>
                                 </a>
                              </span>
                           </div>

                           <!-- <div class="col-md-12 form-text">
                                    <a href="#"><small>forgot password?</small></a>
                                 </div> -->

                        </div>
                        <div class="d-grid">
                           <button type="submit" name="login" class="btn btn-primary">Login</button>
                        </div>

                        <div class="mt-3 text-center">
                           <small>
                              don't have an account?&nbsp;&nbsp;<a href="register.php">Register</a>
                           </small>
                        </div>

                     </form>
                  </div>
               </div>
            </div>
         </div>
         <!-- END: Login -->
         <!-- Footer -->
         <?php include './Layouts/footer.php'; ?>