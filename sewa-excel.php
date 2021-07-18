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
	header("Content-Disposition: attachment; filename=Daftar-sewa.xls");
	?>

<center>
<h2>Daftar Sewa</h2>
</center>
<table>
			<thead>
				<tr>
					<th>ID</th>
					<th>Petugas</th>
					<th>Customer</th>
					<th>No HP</th>
					<th>Mobil</th>
					<th>Tgl Pinjam</th>
					<th>Tgl Kembali</th>
					<th>Lama Sewa</th>
					<th>Total Bayar</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				// query database berdasarkan id yang besar lebih dulu
				$sql = mysqli_query($koneksi,"SELECT * FROM sewa INNER JOIN mobil ON sewa.id_mobil = mobil.id_mobil ORDER BY id_sewa ASC") or die(mysqli_error($koneksi));
				// jika query di atas menghasilkan nilai > 0 makan menjalankan scripts di bawah if
				if (mysqli_num_rows($sql) > 0 ) 
				{
					// buat variable no untuk menyimpan no urut
					$no = 1;

					// melakukan perulangan while dengan dari query $sql
					while ($data = mysqli_fetch_assoc($sql)) 
					{ ?>

				<tr>
					<td><?php echo $data['id_sewa']; ?></td>
					<td><?php echo $data['nama_admin']; ?></td>
					<td><?php echo $data['pelanggan']; ?></td>
					<td><?php echo $data['hp']; ?></td>
					<td><?php echo $data['merk']; ?></td>
					<td><?php echo $data['tgl_pinjam']; ?></td>
					<td><?php echo $data['tgl_kembali']; ?></td>
					<td><?php echo $data['lama_sewa']; ?> Hari</td>
					<td><?php echo "Rp " . number_format($data['total_bayar'], 0, ",", "."); ?></td>
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