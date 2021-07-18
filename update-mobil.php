<?php  
// include config.php
include ('config.php');

// Ambil data dari form edit.php
$id = $_POST['id_mobil'];
$noplat = $_POST['no_plat'];
$jenis = $_POST['jenis'];
$merk = $_POST['merk'];
$tahun = $_POST['tahun'];
$warna = $_POST['warna'];
$harga = $_POST['harga'];

// update data ke database
mysqli_query($koneksi,"UPDATE mobil SET no_plat='$noplat', jenis='$jenis', merk='$merk', tahun='$tahun', warna='$warna', harga='$harga' WHERE id_mobil='$id'");

// redirect ke home
header("location:daftar-mobil.php");

?>