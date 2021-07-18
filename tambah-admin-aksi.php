<?php  
// invlude koneksi.php
include ('config.php');

// Menangkap data yang di submit
$nama = $_POST['nama_admin'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = md5($_POST['password']);

// input data ke database
mysqli_query($koneksi,"INSERT INTO admin(nama_admin, username, email, password) VALUES('$nama','$username', '$email', '$password')") or die(mysqli_error($koneksi));

// mengalihkan kembali ke home
header("location:admin.php");
?>