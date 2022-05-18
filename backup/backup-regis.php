<?php 

// Jika menekan tombol register maka akan masuk ke proses register
if(isset($_POST['regis'])) {
   $email      = htmlspecialchars($_POST['email']); // Mengambil data email
   $username   = htmlspecialchars($_POST['username']); // Mengambil data username
   $password   = htmlspecialchars($_POST['password']); // Mengambil data password
   $password2  = htmlspecialchars($_POST['password2']);// Mengambil data password2

// Mengecek apakah username sudah ada atau belum
$result = mysqli_query($db, "SELECT * FROM multilevel WHERE username = '$username'");
// Jika username sudah ada yang pakai maka akan muncul peringatan alert 
if(mysqli_fetch_assoc($result)) {
   echo "<script>alert('Username sudah Digunakan!')</script>";
   echo "<script>location='register.php'</script>";
}

   // Mengecek apakah password dan password2 sama atau tidak
   if($password == $password2) {
      // Menambahkan ke tabel multilevel
      $password = password_hash($password, PASSWORD_DEFAULT);
      $sql = "INSERT INTO multilevel (email, username, role, password) VALUES ('$email', '$username', '$role', '$password')";
      mysqli_query($db, $sql);
      $_SESSION["username"] = $username;
      // Jika berhasil maka akan kembali ke halaman lolos
      header('Location: login.php');
   } else {
      // Jika password tidak sama maka akan muncul peringatan alert 
      // dan di kembalikan ke halaman register
      echo "<script>alert('Registrasi Anda Gagal!')</script>";
      echo "<script>location.href='register.php'</script>";
   }
}
?>