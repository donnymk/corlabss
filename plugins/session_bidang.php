<?php
session_start();
include "config.php";

if(!isset($_SESSION['user_bidang'])){
//mysqli_close($con); // Menutup koneksi
echo "<script>
		location.replace('login/')</script>";
}

// Ambil nama user berdasarkan username dengan mysql_fetch_assoc
/*$cek_pengguna=mysqli_query($con,"select pengguna from bidang where pengguna='".$_SESSION['bidang']."'");
$row = mysqli_fetch_assoc($cek_pengguna);
$login_session =$row['pengguna'];
if(!isset($login_session)){
mysqli_close($con); // Menutup koneksi
echo "<script>
		location.replace('login/')</script>";
}*/
?>