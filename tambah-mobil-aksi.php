<?php  
// invlude koneksi.php
include ('config.php');

// Menangkap data yang di submit
$noplat = $_POST['no_plat'];
$jenis = $_POST['jenis'];
$merk = $_POST['merk'];
$tahun = $_POST['tahun'];
$warna = $_POST['warna'];
$harga = $_POST['harga'];

// input data ke database
mysqli_query($koneksi,"INSERT INTO mobil(no_plat, jenis, merk,tahun, warna,harga) VALUES('$noplat','$jenis', '$merk', '$tahun', '$warna','$harga')") or die(mysqli_error($koneksi));

// mengalihkan kembali ke home
header("location:daftar-mobil.php");
?>