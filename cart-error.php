<?php @include './Layouts/config.php'; ?>

<?php //include './Layouts/navigasi.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Cart Error</title>

   <!-- Icon Kopi Suka -->
  <link rel="shortcut icon" href="assets/logo/favicon-16x16.png" type="image/x-icon">

   <!-- Font Rubik -->
   <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700&display=swap" rel="stylesheet">

   <!-- Link Fontawesome -->
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

   <!-- Bootstrap 5 CSS -->
   <link rel="stylesheet" href="assets/css/bootstrap.min.css" />

   <!-- CSS Custom -->
   <link rel="stylesheet" href="assets/css/custom.css" />
</head>
<body>
   <div class="container">
      <div class="text-center">
         <div class="row">
            <div class="col-md-8 mx-auto">
               <img src="./assets/image/error-cart.svg" style="margin-top: 6rem;" alt="error-cart" width="350">
               <h1  style="margin-top: 3rem; color: rgb(47, 46, 65); font-weight: bold; ">Upss....</h1>
               <p class=" mt-3" style="color:rgb(47, 46, 65); font-size: 22px;">kamu harus login, untuk melanjutkan pemesanan kopi</p>
               <a href="./login.php" style="font-size: 20px;" class="py-5"><strong>login</strong></a>
            </div>
         </div>
      </div>
   </div>

   <!-- Popper dan Bootstrap 5 JS -->
  <script src="assets/js/bootstrap.bundle.min.js"></script>

   <!-- JQuery -->
   <script src="assets/js/jquery.min.js"></script>
             
   <!-- JS Show & Hide Password -->
   <script src="assets/js/showHide.js"></script>

   <!-- Sweet Alert -->
   <script src="assets/js/sweetalert.min.js"></script>
</body>
</html>