<?php 
// Mengaktifkan session
session_start();

// Menghubungkan database
include './Layouts/config.php';


// Jika menekan tombol register maka akan masuk ke proses register
if(isset($_POST['register'])) {
   $email      = htmlspecialchars($_POST['email']); // Mengambil data email
   $username   = htmlspecialchars($_POST['username']); // Mengambil data username
   $password   = htmlspecialchars($_POST['password']); // Mengambil data password
   $name       = htmlspecialchars($_POST['name']); // Mengambil data name
   $role       = htmlspecialchars($_POST['role']); // Mengambil data role

   // Ekripsi password
   //$password = password_hash($password, PASSWORD_DEFAULT);

   $result2 = mysqli_query($db, "INSERT INTO multilevel (email, username, password, name, role) VALUES ('$email', '$username', '$password', '$name', '$role')");

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
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
   integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

   <!-- Icon Bootstrap -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

   <!-- Bootstrap 5 CSS -->
   <link rel="stylesheet" href="assets/css/bootstrap.min.css" />

   <!-- CSS Custom -->
   <link rel="stylesheet" href="assets/css/custom.css" />

   <title>Register - janji kopi</title>

</head>

<body>

   <!-- START: Login -->
   <div class="container">
      
      <!-- START: Container -->
      <div class="container mt-3">
         <div class="row">
            <div class=" col-md-9 col-lg-6 mx-auto">
               <div class="card border-0 shadow">
                  <div class="card-body">
                     <h2 class="text-left">Register</h2>
                     <hr>
                     <form action="" method="POST">

                     <div class="col-md-12 mx-auto mb-4">
                           <label for="name" class="form-label">Name</label>
                           <input type="name" name="name" class="form-control" id="name" autocomplete="off" required oninvalid="this.setCustomValidity('harap isi bidang ini')" oninput="this.setCustomValidity('')">
                        </div>

                        <div class="col-md-12 mx-auto mb-4">
                           <label for="email" class="form-label">Email</label>
                           <input type="email" name="email" class="form-control" id="email" autocomplete="off" required oninvalid="this.setCustomValidity('harap isi bidang ini')" oninput="this.setCustomValidity('')">
                        </div>

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

                           <div class="input-group">
                              <input type="hidden" class="form-control" name="role" id="role" value="user">
                           </div>

                        </div>

                        
                        <div class="d-grid">
                           <button type="submit" name="register" class="btn btn-primary">Register</button>
                        </div>

                        <div class="mt-3 text-center">
                           <small>
                              already have an account?&nbsp;&nbsp;<a href="login.php">Login</a>
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