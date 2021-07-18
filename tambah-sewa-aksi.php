<?php  
// invlude koneksi.php
include ('config.php');
session_start();

// Menangkap data yang di submit
$admin = $_SESSION['username'];
$pelanggan = $_POST['pelanggan'];
$hp = $_POST['hp'];
$id_mobil = $_POST['id_mobil'];
$tgl_pinjam = $_POST['tgl_pinjam'];
$tgl_kembali = $_POST['tgl_kembali'];
$lama_sewa =  (strtotime($tgl_kembali) - strtotime($tgl_pinjam)) / (60 * 60 * 24);

$query = mysqli_query($koneksi,"SELECT * FROM mobil WHERE id_mobil=$id_mobil");
$data = $query->fetch_assoc();

$total = $data["harga"] * $lama_sewa;

// input data ke database
mysqli_query($koneksi,"INSERT INTO sewa(nama_admin, pelanggan, hp,id_mobil, tgl_pinjam, tgl_kembali, lama_sewa, total_bayar) VALUES('$admin', '$pelanggan', '$hp', '$id_mobil', '$tgl_pinjam', '$tgl_kembali', '$lama_sewa', '$total')") or die(mysqli_error($koneksi));

// mengalihkan kembali ke home
header("location:index.php");
?>