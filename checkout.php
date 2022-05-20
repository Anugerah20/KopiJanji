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
         <div style="margin-top: 3.5rem;">
            <h2>Konfirmasi Pemesanan</h2>
            <small><strong class="text-danger">PENTING<i class="bi bi-exclamation-lg"></i></strong>&nbsp;isi data diri anda dengan benar</small>
      </div>
   </div>
   <hr>

   <form action="" method="POST">
      <div class="row">
         <!-- Start Nama -->
         <div class="col-md-5 col-lg-5 mb-3">
            <div class="input-group">
               <label for="nama" class="input-group">Nama</label>
               <input type="text" class="form-control" name="nama" id="nama" placeholder="Isi nama anda" required>
            </div>
         </div>
         <!-- End Nama -->

         <div class="col-md-5 col-lg-5 mb-3">
            <div class="input-group">
               <label for="phone" class="input-group">No Telepon</label>
               <input type="text" class="form-control" name="phone" id="phone" required>
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
               <label for="" class="input-group">Metode Pembayaran</label>
               <select class="form-select" name="paymen">
                  <option selected>-- Pilih Pembayaran --</option>
                  <option value="cod">COD</option>
                  <option value="gopay">Gopay</option>
                  <option value="paypal">Paypal</option>
                  <option value="bca">BCA</option>
                  <option value="bri">BRI</option>
               </select>
            </div>
         </div>

         <div class="col-md-5 col-lg-5 mb-3">
            <div class="input-group">
               <label for="rumah" class="input-group">No Rumah</label>
               <input type="text" class="form-control" name="rumah" id="rumah" placeholder="Isi no rumah anda" required>
            </div>
         </div>

         <div class="col-md-5 col-lg-5 mb-3">
            <div class="input-group">
               <label for="alamat" class="input-group">Alamat Rumah</label>
               <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Isi alamat rumah anda" required>
            </div>
         </div>

         <div class="col-md-5 col-lg-5 mb-3">
            <div class="input-group">
               <label for="kota" class="input-group">Kota</label>
               <input type="text" class="form-control" name="kota" id="kota" placeholder="Kota anda" required>
            </div>
         </div>

         <div class="col-md-5 col-lg-5 mb-3">
            <div class="input-group">
               <label for="kabupaten" class="input-group">Kabupaten</label>
               <input type="text" class="form-control" name="kabupaten" id="kabupaten" placeholder="Kabupaten anda" required>
            </div>
         </div>

         <div class="col-md-5 col-lg-5 mb-3">
            <div class="input-group">
               <label for="negara" class="input-group">Negara</label>
               <input type="text" class="form-control" name="negara" id="negara" placeholder="Negara anda" required>
            </div>
         </div>

         <div class="col-md-5 col-lg-5 mb-3">
            <div class="input-group">
               <label for="kode" class="input-group">Kode unik</label>
               <input type="text" class="form-control" name="kode" id="kode" placeholder="Kode unik anda" required>
            </div>
         </div>

         <div class="">
            <button type="submit" name="pesan_kopi" class="btn btn-primary" name="submit">Pesan Sekarang</button>
         </div>

      </div>
   </form>
   </div>

      
</div>
        
   <!-- Popper dan Bootstrap 5 JS -->
   <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>