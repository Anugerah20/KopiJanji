<?php 
// Menghubungkan ke database
include '../layouts/config.php';

$id = $_GET['id'];
// Mengambil data product berdasarkan id
$produk         = mysqli_query($db, "SELECT * FROM product WHERE id = '$id'");
$dataProduk     = mysqli_fetch_assoc($produk);
$fotoProduk     = $dataProduk['image_product'];
// unlink adalah fungsi untuk menghapus file
error_reporting(0);
unlink('../assets/fotoProduk/'.$fotoProduk);

// Menghapus product berdasarkan id
$query = "DELETE FROM product WHERE id = '$id'";

$delProd = mysqli_query($db, $query);
?>
<?php
// Jika berhasil menghapus produk, tampilkan pesan berhasil
if($delProd) {
   echo "<script>alert('Produk berhasil dihapus');window.location.href='admin.php';</script>";
// Jika gagal meghapus produk, tampilkan pesan gagal
} else {
   echo "<script>alert('Produk gagal dihapus');window.location.href='admin.php';</script>";
}

?>