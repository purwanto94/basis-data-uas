<?php 
// include head.php
include('head.php'); 
?>
	<!--Bagian Table data-->
	<div class="container" style="margin-top: 20px">
		<h2>Log Perubahan Harga Mobil</h2>
		<hr>
		<a class="btn btn-primary" href="mobil-excel.php" role="button">Print</a>
		<hr>
		<table class="table table-striped table-hover table-sm table-bordered">
			<thead class="thead-dark">
				<tr>
					<th>Log ID</th>
					<th>Mobil</th>
                    <th>No Plat</th>
					<th>Harga Lama</th>
					<th>Harga Baru</th>
					<th>Waktu Perubahan</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				// query database berdasarkan id yang besar lebih dulu
				$sql = mysqli_query($koneksi,"SELECT * FROM log_harga_mobil INNER JOIN mobil ON log_harga_mobil.id_mobil = mobil.id_mobil  ORDER BY log_id ASC") or die(mysqli_error($koneksi));
				// jika query di atas menghasilkan nilai > 0 makan menjalankan scripts di bawah if
				if (mysqli_num_rows($sql) > 0 ) 
				{
					// buat variable no untuk menyimpan no urut
					$no = 1;

					// melakukan perulangan while dengan dari query $sql
					while ($data = mysqli_fetch_assoc($sql)) 
					{ ?>

				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $data['merk']; ?></td>
					<td><?php echo $data['no_plat']; ?></td>
					<td><?php echo "Rp " . number_format($data['harga_lama'], 0, ",", "."); ?></td>
					<td><?php echo "Rp " . number_format($data['harga_baru'], 0, ",", "."); ?></td>
					<td><?php echo $data['waktu_perubahan']; ?></td>
				</tr>
				<?php 
				$no++; }
				} else {
					echo "<tr>Tidak ada data</tr>";
				}
				?>
			</tbody>
		</table>
		
	</div>
<?php include ('footer.php'); ?>