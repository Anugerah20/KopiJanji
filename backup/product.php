<!-- START: Produk Kopi -->
<div class="container kopi" id="menu-kopi">
  <div id="message"></div>
  <div class="row">

    <!-- START: Text Menu Kopi -->
    <div class="text-center mb-3">
      <h2>menu kopi</h2>
    </div>
    <!-- END: Text Menu Kopi -->

    <?php
    // Menghubungkan ke database order-coffee
    include 'config.php';
    // Mengambil data dari table product
    $product = mysqli_query($db, "SELECT * FROM `product`");
    // Menampilkan data dari table product
    if(mysqli_num_rows($product) > 0) :
    while ($row = mysqli_fetch_assoc($product)) :
    ?>

      <!-- START: Kopi Cappucino -->
      <div class="col-12 col-md-6 col-lg-3 mb-3">
        <div class="card shadow">
          <img src="../assets/fotoProduk/<?php echo $row['image_product']; ?>" class="card-img-top" alt="Kopi Cappucino">
          <div class="card-body">
            <div class="card-title">
              <div class="float-end"><i class="fas fa-star"></i>&nbsp;4.8</div>
              <h5><?php echo $row['name_product']; ?></h5>
            </div>
            <p class="card-text">Rp&nbsp;<?php echo number_format($row['price_product']); ?></p>
            <!-- START: Add Product -->
            <button type="submit" class="btn btn-transparent" name="add_cart" style="background: rgb(255, 74, 48); color: #fff;">
              <i class="fas fa-shopping-cart"></i>&nbsp;beli sekarang</button>
            <!-- END: Add Product -->
          </div>
        </div>
      </div>
    <?php 
    endwhile; 
    endif;
    ?>
  </div>
</div>
<!-- END: Produk Kopi -->

<!-- START: Add Cart Kopi -->
<?php
// Menghubungkan ke database
// include 'config.php';

// // Menarik data dari cart
// if(isset($_POST['add_cart'])) {
//   $name_product     = $_POST['name_product'];
//   $price_product    = $_POST['price_product'];
//   $image_product    = $_POST['image_product'];
//   $quantity_product = 1;

//   $query_cart = mysqli_query($db, "SELECT * FROM cart WHERE name = '$name_product'");

//   if(mysqli_num_rows($query_cart) > 0) {
//     echo "<div class='alert alert-warning' role='alert'>Kopi ini sudah ada di keranjang anda</div>";
//   } else {
//     $insert_product = mysqli_query($db, "INSERT INTO cart(name, price, image, quantity) 
//                     VALUES('$name_product', '$price_product', '$image_product', '$quantity_product')");
//     echo "<div class='alert alert-success' role='alert'>Kopi telah ditambahkan ke keranjang</div>";
//   }
// }
?>

<!-- END: Add Cart Kopi -->