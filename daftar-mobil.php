<?php 
// include head.php
include('head.php'); 
?>
	<!--Bagian Table data-->
	<div class="container" style="margin-top: 20px">
		<h2>Daftar Mobil Sewaan</h2>

		<hr>
		<a class="btn btn-primary" href="tambah-mobil.php" role="button">Tambah Mobil</a>
		<a class="btn btn-primary float-right" href="mobil-excel.php" role="button">Print</a>
		<hr>
		<table class="table table-striped table-hover table-sm table-bordered">
			<thead class="thead-dark">
				<tr>
					<th>No</th>
					<th>No Plat</th>
					<th>Jenis</th>
					<th>Merk</th>
					<th>Tahun</th>
					<th>Warna</th>
					<th>Harga</th>
					<th>Aksi</th>
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
					<td><?php echo $no; ?></td>
					<td><?php echo $data['no_plat']; ?></td>
					<td><?php echo $data['jenis']; ?></td>
					<td><?php echo $data['merk']; ?></td>
					<td><?php echo $data['tahun']; ?></td>
					<td><?php echo $data['warna']; ?></td>
					<td><?php echo "Rp " . number_format($data['harga'], 0, ",", "."); ?></td>
					<td>
						<a href="edit-mobil.php?id_mobil=<?php echo $data['id_mobil']; ?>" class="badge badge-warning">Edit</a>
						<a href="hapus-mobil.php?id_mobil=<?php echo $data['id_mobil']; ?>" class="badge badge-danger" onclick="return confirm('Yakin ingin menghapus data ini ?')">Hapus</a>
					</td>
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