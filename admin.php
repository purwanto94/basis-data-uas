<?php 
// include head.php
include('head.php'); 
?>
	<!--Bagian Table data-->
	<div class="container" style="margin-top: 20px">
		<h2>Admin/Petugas</h2>

		<hr>
		<a class="btn btn-primary" href="tambah-admin.php" role="button">Tambah Admin</a>
		<a class="btn btn-primary float-right" href="admin-excel.php" role="button">Print</a>
		<hr>
		<table class="table table-striped table-hover table-sm table-bordered">
			<thead class="thead-dark">
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Username</th>
					<th>Email</th>
                    <th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				// query database berdasarkan id yang besar lebih dulu
				$sql = mysqli_query($koneksi,"SELECT * FROM admin ORDER BY id_admin ASC") or die(mysqli_error($koneksi));
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
					<td><?php echo $data['username']; ?></td>
					<td><?php echo $data['email']; ?></td>
					<td>
						<a href="edit-admin.php?id_admin=<?php echo $data['id_admin']; ?>" class="badge badge-warning">Edit</a>
						<a href="hapus-admin.php?id_admin=<?php echo $data['id_admin']; ?>" class="badge badge-danger" onclick="return confirm('Yakin ingin menghapus data ini ?')">Hapus</a>
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