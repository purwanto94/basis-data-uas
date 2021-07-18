<?php  
// koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "","rental_mobil");

// cek koneksi ke database
if (mysqli_connect_errno()) 
{
	echo "Koneksi database gagal , periksa kembali confignya : ". mysqli_connect_errno();
}

?>