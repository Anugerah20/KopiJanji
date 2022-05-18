<?php 
// mengaktifkan session
//session_start();

//Melakukan koneksi Ke database
$db = mysqli_connect("localhost","root","","order-coffe");

if($db->connect_error) {
   die("Koneksi Gagal : ".$db->connect_error);
}

?>