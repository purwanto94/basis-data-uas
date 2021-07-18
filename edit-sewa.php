<?php  
// include head.php
include ('head.php');
?>
<div class="container" style="margin-top: 20px">
	<h2>Edit Sewa</h2>

	<hr>

	<form action="update-sewa.php" method="post">

	<!-- query dari database -->
	<?php  
	$id = $_GET['id_sewa'];
	$data = mysqli_query($koneksi,"SELECT * FROM sewa INNER JOIN mobil ON sewa.id_mobil = mobil.id_mobil WHERE id_sewa='$id'");

	while ($d = mysqli_fetch_array($data)) { ?>
	
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Customer</label>
			<div class="col-sm-10">
				<input type="hidden" name="id_sewa" value="<?php echo $d['id_sewa']; ?>">
				<input type="hidden" name="nama_admin" value="<?php echo $d['nama_admin']; ?>">
				<input type="text" name="pelanggan" class="form-control" size="4" value="<?php echo $d['pelanggan']; ?>" required>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">No HP</label>
			<div class="col-sm-10">
				<input type="text" name="hp" class="form-control" size="4" value="<?php echo $d['hp']; ?>" required>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Mobil</label>
			<div class="col-sm-10">
				<select class="form-control" name="id_mobil">
					<?php
						$result = mysqli_query($koneksi,"SELECT * FROM mobil");
						while ($rows = mysqli_fetch_array($result)) {
							echo "<option value=" .$rows['id_mobil']. ">" .$rows['merk']. "</option>";
						}
					?>
				</select>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Tgl Pinjam</label>
			<div class="col-sm-10">
				<input type="date" name="tgl_pinjam" class="form-control" size="4" value="<?php echo $d['tgl_pinjam']; ?>" required>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Tgl Kembali</label>
			<div class="col-sm-10">
				<input type="date" name="tgl_kembali" class="form-control" size="4" value="<?php echo $d['tgl_kembali']; ?>" required>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">&nbsp;</label>
			<div class="col-sm-10">
				<input type="submit" name="submit" class="btn btn-primary" value="SIMPAN" onclick="return confirm('Apakah yakin data sudah benar ?')">
			</div>
			
		</div>
	<?php } ?>
	</form>
	
</div>
<?php include ('footer.php'); ?>