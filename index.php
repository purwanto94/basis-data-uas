<?php 
// include head.php
include('head.php'); 
?>
	<!--Bagian Table data-->
	<div class="container" style="margin-top: 20px">
		<h2>Daftar Sewa</h2>

		<hr>
		<a class="btn btn-primary" href="tambah-sewa.php" role="button">Tambah Sewa</a>
		<a class="btn btn-primary float-right" href="sewa-excel.php" role="button">Print</a>
		<hr>
		<table class="table table-striped table-hover table-sm table-bordered">
			<thead class="thead-dark">
				<tr>
					<th>No</th>
					<th>Petugas</th>
					<th>Customer</th>
					<th>No HP</th>
					<th>Mobil</th>
					<th>Tgl Pinjam</th>
					<th>Tgl Kembali</th>
					<th>Lama Sewa</th>
					<th>Total Bayar</th>
					<th>Aksi</th>
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
					<td><?php echo $no; ?></td>
					<td><?php echo $data['nama_admin']; ?></td>
					<td><?php echo $data['pelanggan']; ?></td>
					<td><?php echo $data['hp']; ?></td>
					<td><?php echo $data['merk']; ?></td>
					<td><?php echo $data['tgl_pinjam']; ?></td>
					<td><?php echo $data['tgl_kembali']; ?></td>
					<td><?php echo $data['lama_sewa']; ?> Hari</td>
					<td><?php echo "Rp " . number_format($data['total_bayar'], 0, ",", "."); ?></td>
					<td>
						<a href="edit-sewa.php?id_sewa=<?php echo $data['id_sewa']; ?>" class="badge badge-warning">Edit</a>
						<a href="hapus-sewa.php?id_sewa=<?php echo $data['id_sewa']; ?>" class="badge badge-danger" onclick="return confirm('Yakin ingin menghapus data ini ?')">Hapus</a>
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