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
	<title>Export Data Mobil Ke Excel</title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;

	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>

    <?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Daftar-mobil.xls");
	?>

<center>
<h2>Daftar Mobil Sewaan</h2>
</center>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>No Plat</th>
            <th>Jenis</th>
            <th>Merk</th>
            <th>Tahun</th>
            <th>Warna</th>
            <th>Harga</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        // query database berdasarkan id yang besar lebih dulu
        $sql = mysqli_query($koneksi,"SELECT * FROM mobil ORDER BY id_mobil ASC") or die(mysqli_error($koneksi));
        // jika query di atas menghasilkan nilai > 0 makan menjalankan scripts di bawah if
        if (mysqli_num_rows($sql) > 0 ) 
        {
            // buat variable no untuk menyimpan no urut
            $no = 1;

            // melakukan perulangan while dengan dari query $sql
            while ($data = mysqli_fetch_assoc($sql)) 
            { ?>

        <tr>
            <td><?php echo $data['id_mobil']; ?></td>
            <td><?php echo $data['no_plat']; ?></td>
            <td><?php echo $data['jenis']; ?></td>
            <td><?php echo $data['merk']; ?></td>
            <td><?php echo $data['tahun']; ?></td>
            <td><?php echo $data['warna']; ?></td>
            <td><?php echo "Rp " . number_format($data['harga'], 0, ",", "."); ?></td>
        </tr>
        <?php 
        $no++; }
        } else {
            echo "<tr>Tidak ada data</tr>";
        }
        ?>
    </tbody>
</table>
</body>
</html>