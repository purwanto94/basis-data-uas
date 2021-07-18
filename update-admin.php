<?php  
// include config.php
include ('config.php');

// Ambil data dari form edit.php
$id = $_POST['id_admin'];
$nama = $_POST['nama_admin'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = md5($_POST['password']);

// update data ke database
mysqli_query($koneksi,"UPDATE admin SET id_admin='$id', nama_admin='$nama', username='$username', email='$email', password='$password' WHERE id_admin='$id'");

// redirect ke home
header("location:admin.php");

?>