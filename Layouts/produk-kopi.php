<?php
// Menghubungkan ke database
@include '../Layout/config.php';

// mengaktifkan session
session_start();

$user_id = $_SESSION['id'];

// Menarik data dari cart
if (isset($_POST['add_cart'])) {
  $name     = $_POST['name'];
  $price    = $_POST['price'];
  $image    = $_POST['image'];
  $quantity = 1;


  $query_cart = mysqli_query($db, "SELECT * FROM cart WHERE name_product = '$name' AND user_id = '$user_id'");

  if (mysqli_num_rows($query_cart) > 0) {
    $message[] = "<strong>Opps...Kopi sudah ada di keranjang !!</strong>";
    echo "<meta http-equiv='refresh' content='1;url=../index.php'>";
  } else {
    $insert_product = mysqli_query($db, "INSERT INTO cart(user_id, name_product, price_product, image_product, quantity_product) VALUES('$user_id','$name','$price','$image','$quantity')");

    $message[] = "Kopi berhasil ditambahkan ke keranjang";
    echo "<meta http-equiv='refresh' content='1;url=../index.php'>";
  }
}

?>

<!-- START: Produk Kopi -->
<div class="container kopi" id="menu-kopi">
  <div id="message">
    <?php
    if (isset($message)) {
      foreach ($message as $message) {
        echo "<div class='alert alert-info alert-dismissible fade show' role='alert'>$message</div>";
      }
    }
    ?>
  </div>
  <div class="row">

    <!-- START: Text Menu Kopi -->
    <div class="text-center mb-3">
      <h2>Menu kopi</h2>
    </div>
    <!-- END: Text Menu Kopi -->

    <?php
    // Mengambil data dari table product
    $product = mysqli_query($db, "SELECT * FROM product");
    // M<enampilkan data dari table product
    if (mysqli_num_rows($product) > 0) :
      while ($row = mysqli_fetch_assoc($product)) :
    ?>

        <div class="col-12 col-md-6 col-lg-3 mb-3">
          <div class="card shadow">
            <div class="card-body">
              <form action="" method="POST">
                <img src="../assets/fotoProduk/<?= $row['image_product']; ?>" class="card-img-top">
                <h5 class="mt-2"><?= $row['name_product']; ?></h5>
                <p class="card-text">Rp&nbsp;<?= number_format($row['price_product']); ?></p>

                <input type="hidden" name="name" value=" <?= $row['name_product']; ?>">
                <input type="hidden" name="price" value="<?= $row['price_product']; ?>">
                <input type="hidden" name="image" value="<?= $row['image_product']; ?>">
                <div class="float-end mt-1"><i class="fa fa-star"></i>&nbsp;4.8</div>
                <!-- START: Add Product -->

                <?php
                 // Melakukan pengecekan apakah sudah melakukan login
                // Jika belum maka akan muncul cart error
                if (isset($_SESSION['role'])) {
                ?>
                  <input type="submit" class="btn btn-transparent" name="add_cart" value="Beli Sekarang" style="background: rgb(255, 74, 48); color: #fff;">
                <?php
                } else {
                ?>

                  <input type="submit" class="btn btn-transparent" value="Beli Sekarang" style="background: rgb(255, 74, 48); color: #fff;" onclick="msg()">

                <?php

                }
                ?>

                <!-- END: Add Product -->
            </div>
          </div>
          </form>
        </div>
    <?php
      endwhile;
    endif;
    ?>
  </div>
</div>
<script>
  // Membuat pesan ketika add cart belum melakukan login
  function msg() {
    window.open("../cart-error.php");
  }
</script>
<!-- END: Produk Kopi -->