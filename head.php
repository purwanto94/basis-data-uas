<?php  
// include config.php
include('config.php');

// mengaktifkan session
session_start();
 
// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
	header("location:login.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>RENTAL MOBIL 7ION</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> 
</head>
<body>


	<!--Bagian menu navigasi-->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container">
			<a class="navbar-brand" href="index.php">RENTAL MOBIL 7ION</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="index.php">Daftar Sewa</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="daftar-mobil.php">Mobil</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="admin.php">Petugas</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="log.php">Log Harga</a>
					</li>
				</ul>
				<span class="navbar-text">
					<a class="nav-link" href="logout.php">LOGOUT</a>
				</span>
			</div>
		</div>
	</nav>