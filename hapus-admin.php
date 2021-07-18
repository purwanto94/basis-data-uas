<?php  
// include config.php
include ('config.php');

// jika benar mendapatkan GET id dari URL
if (isset($_GET['id_admin'])) 
{
	// membuat variable $id yang menyimpan nilai dari $_GET['id']
	$id = $_GET['id_admin'];

	// melakukan query ke database, dengan cara select data yang memiliki id yang sama dengan variable $id
	$cek = mysqli_query($koneksi, "SELECT * FROM admin WHERE id_admin='$id'") or die(mysqli_error($koneksi));

	// jika query menghasilkan nilai > 0 maka eksekusi script di bawah
	if (mysqli_num_rows($cek) > 0) 
	{
		// query ke database Delete untuk menghapus data
		$del = mysqli_query($koneksi, "DELETE FROM admin WHERE id_admin='$id'") or die(mysqli_error($koneksi));

		if ($del) 
		{
			echo '<script>alert("Berhasil menghapus data"); document.location="admin.php";</script>';
		}
		else{
			echo '<script>alert("Gagal menghapus data"); document.location="admin.php";</script>';
		}
	}
	else{
		echo '<script>alert("ID Tidak di temukan di database"); document.location="admin.php";</script>';
	}
}
else{
	echo '<script>alert("ID Tidak di temukan di database"); document.location="admin.php";</script>';
	
}

?>