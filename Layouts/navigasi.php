<?php
// Mengaktifkan session
//session_start();

// Menghubungkan ke database
@include './Layouts/config.php';

error_reporting(0);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>janji kopi</title>
  <!-- Icon Kopi Suka -->
  <link rel="shortcut icon" href="assets/logo/favicon-16x16.png" type="image/x-icon">

  <!-- Font Rubik -->
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Link Fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Bootstrap 5 CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />

  <!-- CSS Custom -->
  <link rel="stylesheet" href="assets/css/custom.css" />


</head>

<body id="beranda">

  <!-- START: Navigasi -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="index.php">janji kopi</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-center">
          <li class="nav-item">
            <a class="nav-link" href="#beranda">beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#pelayanan">pelayanan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#menu-kopi">menu kopi</a>
          </li>
          <li class="nav-item me-2">
            <?php
            include_once './Layouts/config.php';
            $user_id = $_SESSION['id'];
            $select_cart = mysqli_query($db,"SELECT * FROM cart WHERE user_id = '$user_id'");
            $row_cart   = mysqli_num_rows($select_cart);

            ?>
            <a class="nav-link" href="cart.php">
              <?php if(!isset($_SESSION['role'])) { ?>
                <i class="fa fa-shopping-cart">&nbsp;<span class="badge bg-secondary">0</span></i>
              <?php } else { ?>
                <i class="fa fa-shopping-cart">&nbsp;<span class="badge bg-secondary"><?= $row_cart; ?></span></i>
              <?php
                 } 
              ?>
            </a>
            </i>
          </li>
        </ul>
          <!-- START: Dropdown -->
          <?php 
        // Kalau sudah login tampilkan menu dropdown username dan logout
        if (isset($_SESSION['role'])) {
          ?>

          <div class="dropdown d-grid">
            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-user"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton2">
              <li><a class="dropdown-item" href="#">Halo, <?php echo $_SESSION['username']; ?></a></li>
              <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
            </ul>
          </div>
          <?php } else if(!isset($_SESSION['role'])) { 
          // Kalau belum melakukan login maka akan diarahkan ke login terlebih dahulu ?>
          <!-- START: Button Login -->
          <form class="d-grid gap-1">
            <button type="button" class="btn btn-primary btn-sm login" data-bs-toggle="modal" data-bs-target="#modalLogin"><a href="login.php">Login</a></button>
          </form>
          <!-- END: Button Login -->
        <?php } ?>

      </div>
    </div>
  </nav>
  <!-- END: Navigasi -->