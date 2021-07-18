<?php  
// include config.php
include ('config.php');

// Ambil data dari form edit.php
$id = $_POST['id_sewa'];
$admin = $_POST['nama_admin'];
$pelanggan = $_POST['pelanggan'];
$hp = $_POST['hp'];
$mobil = $_POST['id_mobil'];
$pinjam = $_POST['tgl_pinjam'];
$kembali = $_POST['tgl_kembali'];
$lama_sewa =  (strtotime($kembali) - strtotime($pinjam)) / (60 * 60 * 24);

$query = mysqli_query($koneksi,"SELECT * FROM mobil WHERE id_mobil=$mobil");
$data = $query->fetch_assoc();

$total = $data["harga"] * $lama_sewa;

// update data ke database
mysqli_query($koneksi,"UPDATE sewa SET id_sewa='$id', nama_admin='$admin', pelanggan='$pelanggan', hp='$hp', id_mobil='$mobil', tgl_pinjam='$pinjam', tgl_kembali='$kembali', lama_sewa='$lama_sewa', total_bayar='$total' WHERE id_sewa='$id'");

// redirect ke home
header("location:index.php");

?>